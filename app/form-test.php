<p id="input" contenteditable="true" onKeyup="myFunction()">This is a paragraph. It is editable. Try to change this text.</p>
<input type="text" id="output">
<script>
  function myFunction() {
    document.getElementById("output").value = document.getElementById("input").innerHTML;
  }
</script>