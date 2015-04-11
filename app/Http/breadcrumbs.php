<?php

// mytodo: Dummy Space for home to keep div displayed instead of hidden when home

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Events
Breadcrumbs::register('events', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Guild Events', route('events'));
});

// Home > News
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News', route('news'));
});

// Home > Member
Breadcrumbs::register('member', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Members', route('member'));
});

// Home > Activity Feeds
Breadcrumbs::register('feeds', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Activity Feeds', route('feeds'));
});

// Home > CoC
Breadcrumbs::register('coc', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Code of Conduct', route('coc'));
});


// Home > chat
Breadcrumbs::register('chat', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Chat', route('chat'));
});



// Home > Admin
Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Administration', route('admin'));
});

// Home > Admin > Guild Members
Breadcrumbs::register('guildmembers', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Guild Members', route('admin/get-members'));
});

// Home > Admin > guildmembers > Page
Breadcrumbs::register('page', function($breadcrumbs)
{
    $breadcrumbs->parent('guildmembers');
    $breadcrumbs->push('Page', route('page'));
});





// Home > Test
Breadcrumbs::register('test', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Testing Page', route('test'));
});