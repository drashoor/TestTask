<?php

namespace App\Console\Commands;

use App\Address;
use App\cUrl;
use App\Inquiry;
use App\Rental;
use App\Tag;
use App\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class sync extends Command
{

    use cUrl;

    protected $signature = 'sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize Data with Tokeet API ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $syncType = $this->choice('What is your name?', ['rental', 'inquiry']);
        if ($syncType == 'rental') {
            $this->syncRental();
        } elseif ($syncType == 'inquiry') {
            $this->syncInquiry();
        }
    }

    private function syncRental()
    {
        $this->prepareApi('rental');

        $results = $this->getApi();

        foreach ($results['data'] as $result) {
            $address = $result['address'];

            if (!Rental::where('pkey', $result['pkey'])->count()) {

                $tags = $result['tags'];
                $type = $result['type'];
                $address = $result['address'];

                $rental = Rental::create($result);

                $rental->long = $result['gps']['long'];
                $rental->lat = $result['gps']['lat'];
                $rental->detail = array_key_exists('detail', $result) ? json_encode($result['detail']) : '';
                $rental->currency = array_key_exists('currency', $result) ? json_encode($result['currency']) : '';

                $created_address = Address::firstOrCreate([
                    'CC' => array_key_exists('CC', $address) ? $address['CC'] : null,
                    'city' => $address['city'],
                    'zip' => array_key_exists('zip', $address) ? $address['zip'] : null,
                    'timezone' => array_key_exists('timezone', $address) ? $address['timezone'] : null,
                    'address' => $address['address'],
                    'state' => $address['state'],
                    'country' => $address['country'],
                ]);

                $rental->address()->associate($created_address);

                $type = Type::firstOrCreate([
                    'name' => $type
                ]);

                $rental->type()->associate($type);

                foreach ($tags as $tag) {
                    $tag = Tag::firstOrCreate([
                        'name' => $tag
                    ]);
                    $rental->tags()->save($tag);
                }

                $rental->save();
            }
        }
    }

    private function syncInquiry()
    {
        $this->line('Downland Inquiry Json File From Tokeet');

        $jsonFile = file_get_contents('https://datafeed.tokeet.com/v1/inquiry/1499700995.4461/699f46d6-0c1c-4b33-8255-c9cdabf24a37/5a30cd58-e1fd-4869-a543-48ec28ddff38/1509806314');

        Storage::put('inquiry/tmp.json', $jsonFile);

        $this->line('Success Downloaded.');

        $this->line('Start Import Inquiries');

        Excel::load(storage_path('app/inquiry/tmp.json'), function ($reader) {
            foreach ($reader->toArray() as $key => $row) {
                if (!Inquiry::where('inquiry_id', $row['inquiry_id'])->count()) {
                    Inquiry::create($row);
                }
            }
        });

        $this->line('Import Inquiries Finished.');

    }
}
