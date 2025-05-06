<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Faker\Core\Blood;
use App\Models\Doctor;
use App\Models\Events;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Blood_Bank;
use App\Models\Appointment;
use App\Models\Blood_Donor;
use App\Models\Blood_Group;
use App\Models\Request_Blood;
use App\Models\Fund_Donation;
use App\Models\Blood_Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // admin account
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'09425371538',
            'address'=>'Yangon',
            'role'=>'admin',
            'password'=>Hash::make('admin123')
        ]);

        // user account
        User::create([
            'name'=>'thoon moe wathan',
            'email'=>'user@gmail.com',
            'phone'=>'09425371538',
            'address'=>'Yangon',
            'role'=>'user',
            'password'=>Hash::make('admin123')
        ]);

        // blood types
        Blood_Group::create([
            'blood_type'=>'A+'
        ]);
        Blood_Group::create([
            'blood_type'=>'A-'
        ]);
        Blood_Group::create([
            'blood_type'=>'B+'
        ]);
        Blood_Group::create([
            'blood_type'=>'B-'
        ]);
        Blood_Group::create([
            'blood_type'=>'AB+'
        ]);
        Blood_Group::create([
            'blood_type'=>'AB-'
        ]);
        Blood_Group::create([
            'blood_type'=>'O+'
        ]);
        Blood_Group::create([
            'blood_type'=>'O-'
        ]);

        // Blood Banks
        Blood_Bank::create([
            'bank_name'=>'Sakura Hospital',
            'state'=>'Yangon',
            'city'=>'Yangon',
            'address'=>'23, Shin Saw Pu Rd., Pann Hlaing Ward, SCHG, Yangon, Yangon, Myanmar',
            'open_at'=>'10:00:00',
            'close_at'=>'17:00:00'
        ]);
        Blood_Bank::create([
            'bank_name'=>'Grand Hantha Hospital',
            'state'=>'Yangon',
            'city'=>'Yangon',
            'address'=>'3, Narnattaw St., Cor. of Strand Rd., Kamayut Tsp., Yangon',
            'open_at'=>'10:00:00',
            'close_at'=>'17:00:00'
        ]);
        Blood_Bank::create([
            'bank_name'=>'SSC Hospital',
            'state'=>'Yangon',
            'city'=>'Yangon',
            'address'=>'7, Shwe Gon Daing Rd., SSC Women Centre, Ngarr Htatt Gyee (South) Ward, BHN, Yangon, Myanmar',
            'open_at'=>'10:00:00',
            'close_at'=>'17:00:00'
        ]);

        // Doctors
        Doctor::create([
            'doctor_name'=>'Dr. Kyaw Kyaw',
            'degree'=>"MBBS – Bachelor of Medicine, Bachelor of Surgery",
            'email'=>'kk@gmail.com',
            'phone'=>'09425371538'
        ]);
        Doctor::create([
            'doctor_name'=>'Dr. Min Min',
            'degree'=>"MD – Doctor of Medicine",
            'email'=>'kk@gmail.com',
            'phone'=>'09425371538'
        ]);
        Doctor::create([
            'doctor_name'=>'Dr. Tun Tun',
            'degree'=>"DO – Doctor of Osteopathic Medicine",
            'email'=>'kk@gmail.com',
            'phone'=>'09425371538'
        ]);

        // donor (user health condition)
        Blood_Donor::create([
            'user_id'=>2,
            'first_name'=>'Thoon Moe Wathan',
            'dob'=>'2004-02-09',
            'blood_id'=>1,
            'weight'=>'100lb'
        ]);

        // company
        Company::create([
            'user_id'=>2,
            'company_name'=>'HP',
            'company_email'=>'hp@gmail.com'
        ]);
        Company::create([
            'user_id'=>2,
            'company_name'=>'Evening Sky',
            'company_email'=>'es@gmail.com'
        ]);
        Company::create([
            'user_id'=>2,
            'company_name'=>'Samsung',
            'company_email'=>'ss@gmail.com'
        ]);

        // blood requests
        Request_Blood::create([
            'user_id'=>2,
            'require_for'=>'Cancer Treatment Support',
            'blood_id'=>3,
            'relation'=>'Grandpa',
            'status'=>0
        ]);
        Request_Blood::create([
            'user_id'=>2,
            'require_for'=>'Complicated Childbirth',
            'blood_id'=>6,
            'relation'=>'Sister',
            'status'=>1
        ]);
        Request_Blood::create([
            'user_id'=>2,
            'require_for'=>'Emergency Surgery After Accident',
            'blood_id'=>2,
            'relation'=>'Aunt',
            'status'=>2
        ]);

        // appointment
        Appointment::create([
            'user_id'=>2,
            'bank_id'=>1,
            'doctor_id'=>1,
            'phone'=>'09425371538',
            'date'=>'2023-12-12',
            'time'=>'10:00:00'
        ]);

        // fund donation
        Fund_Donation::create([
            'user_id'=>2,
            'amount'=>'10000'
        ]);

        // contact
        Contact::create([
            'user_id'=>2,
            'email'=>'user@gmail.com',
            'message'=>'I want to directly speak with the chairman.'
        ]);

        // Blood Inventory
        Blood_Inventory::create([
            'bank_id'=>1,
            'blood_group_id'=>1,
            'collection_date'=>'2023-12-12',
            'expiry_date'=>'2027-12-12',
            'temperature'=>'37',
            'quantity'=>1,
            'status'=>'Expired',
            'test_result'=>'Safe'
        ]);
        Blood_Inventory::create([
            'bank_id'=>3,
            'blood_group_id'=>6,
            'collection_date'=>'2025-12-12',
            'expiry_date'=>'2027-12-12',
            'temperature'=>'36',
            'quantity'=>7,
            'status'=>'Available',
            'test_result'=>'Safe'
        ]);
        Blood_Inventory::create([
            'bank_id'=>2,
            'blood_group_id'=>2,
            'collection_date'=>'2025-12-12',
            'expiry_date'=>'2027-12-12',
            'temperature'=>'35',
            'quantity'=>5,
            'status'=>'Reserved',
            'test_result'=>'Safe'
        ]);

        // Events
        Events::create([
            'event_name'=>'Warm Hearts Winter Drive',
            'description'=>"As the cold season approaches, many individuals and families in our community struggle to stay warm. The Warm Hearts Winter Drive is a donation event aimed at collecting winter essentials like coats, scarves, hats, gloves, socks, and blankets. All items will be distributed to local homeless shelters and low-income families before the winter chill sets in.

                            The event will feature a cozy gathering spot where attendees can enjoy complimentary hot chocolate, tea, and pastries. We’ll also host a “Warm Wishes Wall” where donors can write encouraging messages to accompany their items. Volunteers will be on hand to sort and package donations throughout the day.

                            Whether you're donating a single scarf or a bag full of winter gear, every contribution makes a difference. Let’s come together to spread warmth, love, and compassion this winter season.",
            'place'=>'Community Hall, 45 Elmtree Road, Yangon',
            'date'=>'2025-12-08',
            'time'=>'10:00:00'
        ]);
        Events::create([
            'event_name'=>'Books for Bright Futures',
            'description'=>"Education is a powerful tool, yet many children and young adults across the country lack access to basic reading materials. Books for Bright Futures is a community initiative aimed at collecting gently used or new books to be donated to underserved schools and literacy programs. We are accepting children’s books, young adult novels, reference books, educational textbooks, and storybooks suitable for classrooms and libraries.

                            During the event, volunteers will organize a storytelling hour for children, a reading corner for quiet reflection, and a book exchange table where attendees can swap a book they’ve read for a new one. Local authors will also be joining us to give short readings and answer questions about the writing process.

                            Your book donation could ignite a lifelong love for reading in a child. Help us build brighter futures, one page at a time.",
            'place'=>'Hillview Public Library, Main Auditorium, Manchester',
            'date'=>'2025-12-25',
            'time'=>'14:00:00'
        ]);
        // $this->setupDemoFiles();
        // $this->runArtisanStorageLink();

    }
    // private function setupDemoFiles()
    // {
    //     // Ensure the target directory exists
    //     Storage::disk('public')->makeDirectory('event_pics', 0755, true);

    //     // Get all files from the demo_files directory
    //     $demoFilesPath = database_path('seeders/demo_files');
    //     $files = File::files($demoFilesPath);

    //     // Copy each file to the storage directory
    //     foreach ($files as $file) {
    //         $filename = $file->getFilename();
    //         $sourcePath = $demoFilesPath . '/' . $filename;
    //         $destinationPath = 'event_pics/' . $filename;

    //         if (File::exists($sourcePath)) {
    //             // Copy file to storage/app/public/event_pics
    //             Storage::disk('public')->put($destinationPath, File::get($sourcePath));
    //         }
    //     }

    //     $this->command->info('Demo files copied to storage successfully!');
    // }
    // private function runArtisanStorageLink()
    // {
    //     $this->command->info('Running Artisan storage:link...');
    //     Artisan::call('storage:link');
    //     $this->command->info('Artisan storage:link completed successfully!');
    // }
}
