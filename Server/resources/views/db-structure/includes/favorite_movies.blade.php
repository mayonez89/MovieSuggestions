<h1>favorite_movies</h1>
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
        <TD>user_id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>User id of the person</TD>

    </TR>
    <TR>
        <TD>content_id</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of movie he/she added to favorites</TD>
    </TR>
</TABLE>