<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\HomePage\Actions;

use App\Constants;
use App\Ship\Helpers\Helper;
use App\Models\Reviews;

class createUserReview
{
    public function run($request) {
        sleep(1);

        $request->validate([
            'NAME' => 'required|max:255',
            'REVIEW' => 'required|max:2500',
            'PHOTO' => 'required'
        ]);

        $imgPath = Constants::USER_IMAGE_FOLDERS['reviews'];
        $imageFullPath = $_SERVER['DOCUMENT_ROOT'].$imgPath;
        $fileExtension = Helper::getExtension($_FILES["PHOTO"]["name"]);
        $filename = uniqid() . '.' . $fileExtension;
        move_uploaded_file($_FILES["PHOTO"]["tmp_name"], $imageFullPath.$filename);
        $linkToImage = $imgPath.$filename;


        $arrReviewFields = [
            'NAME' => $request->NAME,
            'REVIEW' => $request->REVIEW,
            'PHOTO' => $linkToImage,
        ];

        $newReview = Reviews::create($arrReviewFields);

        //sending notification to admin
        $date = (object) [
            'entity' => 'review',
            'message' =>  'Added new review',
            'entity_id' => $newReview->ID,
        ];

        return $date;
    }

}