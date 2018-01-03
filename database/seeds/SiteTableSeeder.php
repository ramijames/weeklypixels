<?php

use Illuminate\Database\Seeder;
use App\Site;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Standard starting set of sites for when I refresh the database
        $site_dn = new Site();
        $site_dn->title = 'Designer News';
        $site_dn->shortname = 'DN';
        $site_dn->link = 'https://www.designernews.co/';
        $site_dn->selector = '.list-story-main-grouper a.montana-item-title';
        $site_dn->weight = 0;
        $site_dn->save();

        $site_yc = new Site();
        $site_yc->title = 'YCombinator News';
        $site_yc->shortname = 'YC';
        $site_yc->link = 'https://news.ycombinator.com/';
        $site_yc->selector = '.title .storylink';
        $site_yc->weight = 0;
        $site_yc->save();

        $site_dn = new Site();
        $site_dn->title = 'Sidebar';
        $site_dn->shortname = 'SB';
        $site_dn->link = 'https://sidebar.io/';
        $site_dn->selector = '.posts-item-title-link';
        $site_dn->weight = 0;
        $site_dn->save();
    }
}
