<html>
<head>
</head>
<body>
  <span class="minus"> - </span>
  <span class="num"> 01 </span>
  <span class="plus"> + </span>
  <script>
    const plus =document.querySelector(".plus"),
    minus =document.querySelector(".minus"),
    num =document.querySelector(".num");

    let a = 1;
    plus.addEventListener("click",()=>{
    a++;
    a = (a< 10)?"0" + a :a;
    num.innerText = a;
    console.log("a");
    });
    </script>
</body>
</html>