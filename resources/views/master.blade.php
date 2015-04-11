<html lang="en">
@include('partials.master-header')

<body>

@include('partials.master-heading')


<MAIN>
    <SECTION class="main-area">
        <aside>
            @include('partials.facebook_like')
            <h4>RAID GUIDE <br>
                <a href="https://www.youtube.com/user/FatbossTV" target="_blank">
                    <img src="/images/fatboss.png" alt="FATBOSS TV" title="FATBOSS TV"/></a>
            </h4>
            <img src="/images/guilds_standard.jpg" alt="Guild Standard"/>


        </aside>
        <SECTION class="column content">
            @yield('content')
        </SECTION>

    </SECTION>

</MAIN>


@include('partials.footer')

</body>
</html>
 