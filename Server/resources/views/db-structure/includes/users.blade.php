<h1>users</h1>
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
        <TD> Unique Id of each entry</TD>
    </TR>
    <TR>
        <TD>email</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>UNI</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Email of a user</TD>
    </TR>
    <TR>
        <TD>password</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Password of user</TD>
    </TR>
    <TR>
        <TD>deleted_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry delete time</TD>
    </TR>
    <TR>
        <TD>created_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry create time</TD>
    </TR>
    <TR>
        <TD>updated_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Entry update time</TD>
    </TR>
</TABLE>