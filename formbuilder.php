<html>
<body>
<form id="form1" method="POST" action="formbuilder.php">
<div id=1>
Form ID<input name="formid" type="text" value=""><br>
Form Method<input name="formmethod" type="text" value=""><br>
Form Action<input name="formaction" type="text" value=""><br>
Form Field 1 Name<input name="fname1" type="text" value=""><br>
Form Field 1 ID<input name="fID1" type="text" value""><br>
Form Field 1 Type<input name="ftype1" type="text" value=""><br>
</div>
</form>
<input type="submit" value="submit" form="form1">
<button type="button" onClick='addField()'>add more fields</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
i=2
function addField(){
	var addedElement=document.createElement("div");	
	addedElement.setAttribute("id",i);
	$("form").append(addedElement);
	$(addedElement).append("Form Field "+i+" Name<input name=\"fname"+i+"\" type=\"text\" value=\"\"><br>Form Field "+i+" ID<input name=\"fID"+i+"\" type=\"text\" value\"\"><br>Form Field "+i+" Type<input name=\"ftype"+i+"\" type=\"text\" value=\"\">").html();
	i++;
} 
</script>
</html>
<?php 
if (!empty($_POST)){
$section=array_slice($_POST, 3);
$i=1;
$method=$_POST['formmethod'];
$formid=$_POST['formid'];
$formaction=$_POST['formaction'];
echo "<br>".htmlspecialchars("<form id='".$formid."' method='".$method."' action='".$formaction."'>");
echo "<br>";
foreach ($section as $key=>$value){
	if (strpos($key, (string)($i)) !== false){
		echo $value.htmlspecialchars("<input name='".$value."' type='".$value."' value=''><br>")."<br>";
		$i=$i+1;}
}
echo htmlspecialchars("<input type='submit' value='submit'>");
echo "<br>";
echo htmlspecialchars("</form>");
}
?>
