<h1>profiles</h1>
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
        <TD>Unique Id of user profile</TD>
    </TR>
    <TR>
        <TD>name</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Name of user</TD>
    </TR>
    <TR>
        <TD>age</TD>
        <TD>int</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Age of user</TD>
    </TR>
    <TR>
        <TD>gender</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Gender of user</TD>
    </TR>
    <TR>
        <TD>country_id</TD>
        <TD>varchar(255)</TD>
        <TD>YES</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of country he/she resides</TD>
    </TR>
    <TR>
        <TD>deleted_at</TD>
        <TD>timestamp</TD>
        <TD>YES</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Profile deleted time </TD>
    </TR>
</TABLE>