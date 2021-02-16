<h1>ratings</h1>
<TABLE BORDER=1>
    <TR>
        <TH>Field</TH>
        <TH>Type</TH>
        <TH>Null</TH>
        <TH>Key</TH>
        <TH>Default</TH>
        <TH>Extra</TH>
    </TR>
    <TR>
        <TD>id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>PRI</TD>
        <TD>NULL</TD>
        <TD>auto_increment</TD>
    </TR>
    <TR>
        <TD>value</TD>
        <TD>int unsigned</TD>
        <TD>NO</TD>
        <TD></TD>
        <TD>NULL</TD>
        <TD></TD>
    </TR>
    <TR>
        <TD>content_id</TD>
        <TD>varchar(255)</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
    </TR>
    <TR>
        <TD>user_id</TD>
        <TD>bigint unsigned</TD>
        <TD>NO</TD>
        <TD>MUL</TD>
        <TD>NULL</TD>
        <TD></TD>
    </TR>
</TABLE>