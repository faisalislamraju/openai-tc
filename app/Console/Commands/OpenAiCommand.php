<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Client;

class OpenAiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openai {prompt : user prompt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Client $client)
    {
        $prompt = $this->argument('prompt');

        $result = $client->completions()->create([
            'prompt' => $prompt,
            'model' => 'text-davinci-002',
            'max_tokens' => 250,
        ]);

        $this->line(ltrim($result->choices[0]->text));

        return Command::SUCCESS;
    }
}
