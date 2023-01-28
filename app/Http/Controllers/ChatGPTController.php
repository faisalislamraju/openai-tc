<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Client;

class ChatGPTController extends Controller
{
    public function generateResponse(Request $request, Client $openai)
    {
        // Validate the user input
        $request->validate([
            'prompt' => 'required|string|max:255',
        ]);

        $prompt = $request->input('prompt');

        // Send the prompt to ChatGPT and receive the response
        $response = $openai->completions()->create([
            'prompt' => $prompt,
            'model' => 'text-davinci-003',
            'max_tokens' => 250,
        ]);
        $responseText = ltrim($response->choices[0]->text);

        // Return the response to the view
        return view('chatgpt', ['prompt' => $prompt,'response' => $responseText]);
    }
}
