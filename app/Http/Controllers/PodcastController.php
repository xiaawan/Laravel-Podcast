<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Podcast;
use Storage;

class PodcastController extends Controller
{
	public $rules = [
		'name' => 'required|min:4',
		'description' => 'max:1000',
		'marketing_url' => 'url',
		'feed_url' => 'url',
	];

	public $messages = [
		'name.required' => 'Podcast name is required.',
		'name.min' => 'Podcast name should be at least 4 characters long',
		'description.max' => 'Description should not be more than 1000 characters long',
		'marketing_url.url' => 'Marketing URL is not a valid URL',
		'feed_url.url' => 'Feed URL is not a valid URL',
	];


	public function index($status = 'review')
	{
		return Podcast::where('status', $status)->paginate(12);
	}

	public function show($id)
	{
		$podcast = Podcast::find($id);
		if (!empty($podcast)) {
			return $podcast;
		}
		else {
			return response()->json(['error' => 'This podcast does not exist.'], 500);
		}
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), $this->rules, $this->messages);
		if ($validator->fails()) {
			return response()->json([$validator->messages()->first()], 500);
		}

		$data = [
			'name' => $request->get('name'),
			'description' => $request->get('description'),
			'marketing_url' => $request->get('marketing_url'),
			'feed_url' => $request->get('feed_url'),
		];


		if (!empty($request->get('image')) && preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $request->get('image'))) {
			$image_name = 'image_' . time() . '.png';
			Storage::disk('app')->put($image_name, base64_decode($request->get('image')));

			$data['image'] = $image_name;
		}
		else {
			$data['image'] = null;
		}

		$podcast = Podcast::where('name', $data['name'])->get()->first();
		if (empty($podcast)) {
			$podcast = Podcast::create($data);
			return response()->json($podcast, 201);
		}
		else {
			return response()->json(['error' => 'A podcast with this name already exists'], 409);
		}
	}

	public function update(Request $request, Podcast $podcast)
	{
		$validator = Validator::make($request->all(), $this->rules, $this->messages);
		if ($validator->fails()) {
			return response()->json([$validator->messages()->first()], 500);
		}

		$podcast->update($request->all());
		return response()->json($podcast, 200);
	}

	public function delete($id)
	{
		$podcast = Podcast::find($id);
		$podcast->delete();
		return response()->json(null, 204);
	}

	public function approve(Request $request, $id) {
		$podcast = Podcast::find($id);
		if ($podcast->status == 'review') {
			$podcast->update(['status' => 'published']);
			return response()->json(['status' => 'published'], 200);
		}
		else {
			return response()->json(['error' => 'This podcast is already approved.'], 409);
		}
	}
}
