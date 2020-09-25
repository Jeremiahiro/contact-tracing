<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SplashResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SplashImage;
use Cloudder;

class SplashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $splash = SplashImage::all();
        return response([ 
                'splash_images' => SplashResource::collection($splash), 
                'message' => 'Retrieved successfully'
            ], 200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'splash_image'   => 'required|image|mimes:jpeg,bmp,jpg,png|between:1,6000',
            'description'    => 'required|string|max:120',
            'type'           => 'required|in:Location,Contact,Support',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'message' => 'Validation Error']);
        }

        $splash_image = $data['splash_image']->getRealPath();
        $upload = Cloudder::upload($splash_image, null, ['folder' => 'SOP_Splash_Image']);

        if($upload){
            list($width, $height) = getimagesize($splash_image);
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            
            $splash = SplashImage::create([
                'splash_image' => $image_url,
                'description'  => $data['description'],
                'type'         => $data['type'],
            ]);

            return response([ 
                    'success' => true,
                    'splash' => new SplashResource($splash), 
                    'message' => 'Created successfully'
                ], 200
            );

        } else {
            return response()->json(['error' => 'Oops! Something went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SplashImage $splashImage)
    {
        return response([ 
            'splash_image'  => new SplashResource($splashImage), 
            'message'       => 'Retrived successfully'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SplashImage $splashImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SplashImage $splashImage)
    {
        $splashImage->update($request->all());

        return response([ 
            'splash_image'  => new SplashResource($splashImage), 
            'message'       => 'Updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SplashImage $splashImage)
    {
        $splashImage->delete();

        return response(['message' => 'Deleted']);
    }
}
