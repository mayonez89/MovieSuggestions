<h1>friends</h1>
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
        <TD>Unique Id of an entry</TD>
    </TR>
    <TR>
        <TD>status</TD>
        <TD>enum('new','accepted','rejected','blocked')</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>new</TD>
        <TD></TD>
        <TD>Status of friend request</TD>
    </TR>
    <TR>
        <TD>requester</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of user that has requested</TD>
    </TR>
    <TR>
        <TD>requested</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
        <TD>Id of user that has been requested</TD>
    </TR>
</TABLE>