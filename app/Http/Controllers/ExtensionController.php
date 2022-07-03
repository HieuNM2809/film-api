<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ExtensionController extends Controller
{
    // ví dụ gọi api fpt ai text_to_speech
    public function textToSpeech($text = 'Không có dữ liệu')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fpt.ai/hmi/tts/v5',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $text,
            CURLOPT_HTTPHEADER => array(
                'api-key: 3iNeVbSZCqQ6w7TO8TUX00MZLIMLQw58',
                'speed: ',
                'voice: banmai'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return 'cURL Error #:' . $err;
        } else {
            $newString = substr($response, 0, -1);
            return json_decode($newString, true);
        }
    }
    // custom api text to speech
    public function  get_api_text_to_speech($text = "")
    {
        $response = $this->textToSpeech($text);
        //call api that bai
        if (empty($response)) {
            return  ['error' => -1];
        }
        return json_encode(['data' => json_decode($response, true)]);

        // example response
        // {
        //     "async":"https://file01.fpt.ai/text2speech-v5/short/2022-01-13/2b1cca8fb0601df7f219f1e92a0643ee.mp3",
        //     "error":0,
        //     "message":"The content will be returned after a few seconds under the async link.",
        //     "request_id":"18df6bcf-830d-4983-861f-3302ca691c2b"
        //  }
    }
}
