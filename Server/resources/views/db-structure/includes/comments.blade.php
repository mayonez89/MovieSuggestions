<h1>comments</h1>
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
        <TD>unique Id for every entry</TD>
    </TR>
    <TR>
        <TD>text</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Comment text</TD>
    </TR>
    <TR>
        <TD>content_id</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of a movie on to which this comment belongs</TD>
    </TR>
    <TR>
        <TD>user_id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>User who commented</TD>
    </TR>
    <TR>
        <TD>created_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Time of comment</TD>
    </TR>
    <TR>
        <TD>updated_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Time when comment updated</TD>
    </TR>
</TABLE>