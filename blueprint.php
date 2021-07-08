<?php
/**
 * Dynamic Blueprint
 * Version: 1.1.1
 */
 
 $admin_user="testadmin";
 $password="password";
 $admin_email="testadmin@$siteName";

/** Download the latest version of WordPress*/
ds_cli_exec( "wp core download" );

//** Install WordPress
ds_cli_exec( "wp core install --url=$siteName --title='WP Testing' --admin_user=$admin_user --admin_password=$password --admin_email=$admin_email" );

//** Change the tagline
ds_cli_exec( "wp option update blogdescription 'Testing WordPress'" );

//** Don't e-mail me when anyone posts a comment.
ds_cli_exec( "wp option update default_comment_status 0" );

//** Don't e-mail me when a comment is held for moderation.
ds_cli_exec( "wp option update moderation_notify 0" );

//** Disallow comments (can be overridden with individual posts)
// ds_cli_exec( "wp option update default_comment_status 'closed'" );

//** Change Permalink structure
// ds_cli_exec( "wp rewrite structure '/%postname%/'" );

//** Discourage search engines from indexing this site
ds_cli_exec( "wp option update blog_public 'on'" );

//** Download plugin from repository, unzip WPSiteSync for Content, activate
ds_cli_exec( "wp plugin install wpsitesynccontent" );
ds_cli_exec( "wp plugin activate wpsitesynccontent" );

//** Download plugin from repository, unzip WP Beta Tester, activate
ds_cli_exec( "wp plugin install wordpress-beta-tester" );
ds_cli_exec( "wp plugin activate wordpress-beta-tester" );

//** Download plugin from repository, unzip Classic Editor
ds_cli_exec( "wp plugin install classic-editor");

//** Download plugin from repository, unzip Classic Widgets
ds_cli_exec( "wp plugin install classic-widgets");

//** Download plugin from repository, unzip Site Health Check, activate
ds_cli_exec( "wp plugin install health-check");
ds_cli_exec( "wp plugin activate health-check");

//** Download plugin from repository, unzip Query Monitor, activate
ds_cli_exec( "wp plugin install query-monitor");
ds_cli_exec( "wp plugin activate query-monitor");

//** Download plugin from repository, unzip Debug Bar, activate
ds_cli_exec( "wp plugin install debug-bar");
ds_cli_exec( "wp plugin activate debug-bar");

//** Download plugin from repository, unzip Show Hooks
ds_cli_exec( "wp plugin install show-hooks");


//** Download plugin from repository, unzip WPCrontrol, 
ds_cli_exec( "wp plugin install wp-crontrol");


//** Download plugin from repository, unzip Transients Manager
ds_cli_exec( "wp plugin install transients-manager");


//** Download plugin from repository, unzip WPSiteSync for Content, activate
ds_cli_exec( "wp plugin install wpsitesynccontent" );
ds_cli_exec( "wp plugin activate wpsitesynccontent" );

//** Download & Activate Theme from WordPress repository
ds_cli_exec( "wp theme install tt1-blocks --activate" );

//** Download & Activate Theme from Git
// ds_cli_exec( "git clone https://github.com/WordPress/theme-experiments.git wp-content/themes/");
//ds_cli_exec( "wp theme activate tt1" );

//** Download & Activate Plugin from Git
ds_cli_exec( "git clone https://github.com/afragen/git-updater.git wp-content/plugins/git-updater/" );
ds_cli_exec( "wp plugin activate git-updater" );

//** Download & Activate Visual Studio Code Support
ds_cli_exec("git clone https://github.com/ServerPress/visual-studio-code-support.git wp-content/plugins/visual-studio-code-support");
ds_cli_exec(" wp plugin activate visual-studio-code-support");

//** Download & Activate Gutenberg Nightlies
ds_cli_exec("git clone https://github.com/WordPress/gutenberg.git wp-content/plugins/gutenberg");
ds_cli_exec(" wp plugin activate gutenberg");


//** Remove Default Plugins
ds_cli_exec( "wp plugin delete akismet" );
ds_cli_exec( "wp plugin delete hello" );

//** Set the timezone
ds_cli_exec( "wp option update timezone_string 'America/New_York'" );
ds_cli_exec( "wp option update time_format 'g:i A'");
ds_cli_exec( "wp option update start_of_week 0" );


//** Create a local Git Repo
ds_cli_exec( "git init");

/** To Deploy to github, you will need an account, and setup a token at https://github.com/settings/tokens/new (used below)
 *  You will also need a SSH key setup from within DesktopServer.  Do this by creating another site and opening DSCLI
 *  then run ssh-keygen.exe
 *  Accept the defaults for the prompts, and then cat the .pub file from the directory it specifies.
 *  Take that information and login into your Github Account, and go to account settings.
 *  https://github.com/settings/keys  add your SSH key on this page with a note to help you remember.
 *  */

//** Change to your github user and token
// $git_user = "user";
// $git_token = "token";

// //** Set default user and token from github
// ds_cli_exec( "git config --global github.user $git_user" );
// ds_cli_exec( "git config --global github.token $git_token" );

// //** Create Github Repo 
// ds_cli_exec( "curl -u $git_user:$git_token https://api.github.com/user/repos -d '{ \"name\": \"$siteName\" }'" );

// //** Add remote origin to git
// ds_cli_exec( "git remote add origin git@github.com:$git_user/$siteName.git" );

//** Add files to local Repo
ds_cli_exec( "git add wp-content");

//** Do inital Commit
ds_cli_exec( "git commit -m 'Intial Commit'");

//** Send Commit to Github
ds_cli_exec( "git push -u origin master" );

//** Create a directory & get image from Github based on DS-CLI
ds_cli_exec( "mkdir ./media" );
ds_cli_exec( "wget https://jawordpressorg.github.io/wapuu/wapuu-original/wapuu-original.svg -O ./media/wapuu.svg" );

//** Add a Editor User
ds_cli_exec( "wp user create bob bob@example.com --role=editor" );

//** Import dummy content for posts / WordPress Imported plugin is required
ds_cli_exec( "wp plugin install wordpress-importer --activate");
ds_cli_exec( "wp import https://github.com/WPTT/theme-test-data.git --authors=create");
ds_cli_exec( "wp import https://github.com/Automattic/theme-tools/blob/master/gutenberg-test-data/gutenberg-test-data.xml --authors=create");
ds_cli_exec( "wp import https://github.com/Automattic/theme-tools/blob/3f72f6fab48717bbd9a0fd78c71dde19df3b16bb/gutenberg-test-data/jetpack-shortcode-test-data.xml --authors=create");


//** Deactivate and remove WordPress Imported plugin is required
ds_cli_exec( "wp plugin uninstall wordpress-importer --deactivate");

//** Create dummy content for posts
//ds_cli_exec( "curl http://loripsum.net/api/4 | wp post generate --post_content --count=10");

//** Import image from remote site and assign to post 1 as a featured image
//ds_cli_exec( "wp media import https://s.w.org/style/images/wp-header-logo.png --post_id=1 --featured_image");

//** Check if index.php unpacked okay
if ( is_file( "index.php" ) ) {

	//** Cleanup the files in this script.
	ds_cli_exec( "rm blueprint.php" );	
	ds_cli_exec( "rm index.htm" );
	ds_cli_exec( "rm about-page-content.txt" );
	ds_cli_exec( "rm wordpress-wxr-example.xml" );
	ds_cli_exec( "rm screenshot.png" );
}
