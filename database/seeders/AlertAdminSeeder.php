<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AlertAdminSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('title', 255)->nullable();
    // $table->text('content')->nullable();
    // $table->bigInteger('id_user')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {

        $content[0] = '<p>This <a href="https://ckeditor.com/docs/ckeditor4/latest/guide/dev_inline.html">inline editor</a> instance is using the&nbsp;<a href="https://ckeditor.com/cke4/addon/sourcedialog">Source Dialog</a>&nbsp;plugin for source editing.</p>
            <p>Follow the steps below to try it out:</p>
            <ul><li>Click the&nbsp;<strong>Source&nbsp;</strong>button to display the HTML source of this text in the Source dialog window.</li>
            <li>Close the Source dialog window&nbsp;to return to the WYSIWYG view.</li></ul>
            <p>The following configuration option was used:</p><pre>config.extraPlugins = &#39;sourcedialog&#39;;
            </pre>';

        $content[1] ='<p>This <a href="https://ckeditor.com/docs/ckeditor4/latest/guide/dev_framed">classic editor</a> is using the <a href="https://ckeditor.com/cke4/addon/sourcedialog">Source Dialog</a> plugin for source editing.&nbsp;Follow the steps below to try it out:</p><ul>
            <li>Click the&nbsp;<strong>Source&nbsp;</strong>button to display the HTML source of this text in the Source dialog window.</li>
            <li>Close the Source dialog window&nbsp;to return to the WYSIWYG view.</li>
            </ul><p>The following configuration options were used:</p> <pre>
            config.extraPlugins = &#39;sourcedialog&#39;;
            config.removePlugins = &#39;sourcearea&#39;;</pre>';

        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('alert_admin')->insert([
                'title' => 'Title '. $i,
                'content' => $content[rand(0,1)],
                'id_user' =>$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
