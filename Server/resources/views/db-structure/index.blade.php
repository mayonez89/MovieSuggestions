<h1>Tables</h1>
<TABLE BORDER=1>
    <TR>
        <TH>Tables_in_movie_suggestions</TH>
    </TR>
    <TR>
        <TD>comments</TD>
    </TR>
    <TR>
        <TD>content_genres</TD>
    </TR>
    <TR>
        <TD>contents</TD>
    </TR>
    <TR>
        <TD>countries</TD>
    </TR>
    <TR>
        <TD>favorite_movies</TD>
    </TR>
    <TR>
        <TD>friends</TD>
    </TR>
    <TR>
        <TD>genres</TD>
    </TR>
    <TR>
        <TD>likes</TD>
    </TR>
    <TR>
        <TD>profile_genres</TD>
    </TR>
    <TR>
        <TD>profiles</TD>
    </TR>
    <TR>
        <TD>ratings</TD>
    </TR>
    <TR>
        <TD>users</TD>
    </TR>
</TABLE>


@foreach(array_diff(scandir('../resources/views/db-structure/includes'), array('.', '..')) as $fileName)
    @if(str_ends_with($fileName, '.blade.php'))
        @include('db-structure.includes.' . explode('.', $fileName)[0])
    @endif
@endforeach