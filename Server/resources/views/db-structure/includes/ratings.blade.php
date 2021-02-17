<h1>ratings</h1>
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
        <TD>id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>PRI</TD>
        <TD>NULL</TD>
        <TD>auto_increment</TD>
        <TD>Unique Id of entry</TD>
    </TR>
    <TR>
        <TD>value</TD>
        <TD>int unsigned</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Rating</TD>
    </TR>
    <TR>
        <TD>content_id</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of a movie that has been rated </TD>
    </TR>
    <TR>
        <TD>user_id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>User that has given rating</TD>
    </TR>
</TABLE>