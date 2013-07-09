{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Update page'}</h3>
</div>


<a href="x" class="tooltips" title="ini title" alt="ini alt">Tooltip Sample</a>
<br>
<h2>{gt text='Welcome'}</h2>

{form cssClass="z-form"}
{formvalidationsummary}

{/form}

<h4>Developer Notes</h4>
Visitor can access this module from url: <a href="{home}%module.id%">{home}%module.id%</a>

<br /><br />
you can edit menu above, from file:<br>
<code>
%module.name%/lib/%module.name%/Api/Admin.php
</code>

<br><br>from function:<br>
<code>
public function getlinks()
</code>

<br><br>you can edit this html content/layout, from file:<br>
<code>
%module.name%/templates/admin/main.tpl
</code>
<br>depend from definition at file <code>%module.name%/lib/%module.name%/Controller/Admin.php</code> line 41

<br><br>Tetap SemangaT
<br /><br />
{adminfooter}

<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>


