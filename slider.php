<style type="text/css">
  .slider{
  width: 526px;
    height: auto;
  margin:50px auto 0;
  overflow: hidden;
}

.slider ul {
  display: flex;
  padding: 0;
  width: 400%;
  
  animation: slide 16s infinite alternate ease-in-out;
}
 .slider li {
  width: 100%;
  list-style: none;
}

.slider img {
  width: 100%;
}

@keyframes slide {
  0% {margin-left: 0;}
  20% {margin-left: 0;}
  
  25% {margin-left: -100%;}
  45% {margin-left: -100%;}
  
  50% {margin-left: -200%;}
  70% {margin-left: -200%;}
  
  75% {margin-left: -300%;}
  100% {margin-left: -300%;}
}


</style>
