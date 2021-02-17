<h1>contents</h1>
<TABLE BORDER=1>
    <TR>
        <TH>Field</TH>
        <TH>Type</TH>
        <TH>Null</TH>
        <TH>Key</TH>
        <TH>Default</TH>
        <TH>Extra</TH>
        <TH>Description</TH>
    </TR>
    <TR>
        <TD>slug</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Slug</TD>
    </TR>
    <TR>
        <TD>title</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Movie title</TD>
    </TR>
    <TR>
        <TD>trailer_url</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>URL for the trailer</TD>
    </TR>
    <TR>
        <TD>description</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD> Movie description</TD>
    </TR>
    <TR>
        <TD>director</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Director of the movie</TD>
    </TR>
    <TR>
        <TD>release_date</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Year in which movie was released</TD>
    </TR>
    <TR>
        <TD>deleted_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry delete date</TD>
    </TR>
    <TR>
        <TD>created_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry create date</TD>
    </TR>
    <TR>
        <TD>updated_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry update date</TD>
    </TR>
</TABLE>