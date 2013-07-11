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

{adminfooter}

<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>


