<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Athlete;
use App\Calendar;
use App\Trainer;
use App\Plan;
use App\Subscription;
use App\TrainerPlan;
use App\Profile;
use App\Routine;
use App\Training;
use App\TrainingRoutine;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::truncate();
        Athlete::truncate();
        Trainer::truncate();
        Plan::truncate();
        Subscription::truncate();
        TrainerPlan::truncate();
        Profile::truncate();
        Routine::truncate();
        Training::truncate();
        Calendar::truncate();
        TrainingRoutine::truncate();

        $cantidad_users = 100;
        $cantidad_athletes = 80;
        $cantidad_trainers = 20;
        $cantidad_profiles = 200;
        $cantidad_plans = 5;
        $cantidad_subscriptions = 150;
        $cantidad_trainer_plans = 40;
        $cantidad_routines = 50;
        $cantidad_trainings = 150;
        $cantidad_calendars = 300;
        $cantidad_training_routines = 150;

        factory(User::class, $cantidad_users)->create();
        factory(Athlete::class, $cantidad_athletes)->create();
        factory(Trainer::class, $cantidad_trainers)->create();
        factory(Profile::class, $cantidad_profiles)->create();
        factory(Plan::class, $cantidad_plans)->create();
        factory(Subscription::class, $cantidad_subscriptions)->create();
        factory(TrainerPlan::class, $cantidad_trainer_plans)->create();
        factory(Routine::class, $cantidad_routines)->create();
        factory(Training::class, $cantidad_trainings)->create();
        factory(Calendar::class, $cantidad_calendars)->create();
        factory(TrainingRoutine::class, $cantidad_training_routines)->create();

    }


}
