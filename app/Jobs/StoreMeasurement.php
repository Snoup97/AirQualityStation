<?php

namespace App\Jobs;

use App\Measurement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreMeasurement implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->data['name'] = $request->get('name');
        $this->data['temperature'] = $request->get('temperature');
        $this->data['humidity'] = $request->get('humidity');
        $this->data['pressure'] = $request->get('pressure');
        $this->data['gas'] = $request->get('gas');
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Measurement::create($this->data);
    }
}
