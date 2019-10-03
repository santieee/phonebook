<template>
   <div class="loader-wrapper">
    <div class="loader">
      <div class="dot d1"></div>
      <div class="dot d2"></div>
      <div class="dot d3"></div>
      <div class="dot d4"></div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.loader-wrapper {
  display:-webkit-box;
  display:-ms-flexbox;
  display:flex;
  -webkit-box-pack:center;
      -ms-flex-pack:center;
          justify-content:center;
  -webkit-box-align:center;
      -ms-flex-align:center;
          align-items:center;
}

.loader {
  width:120px;
  height:20px;
  display:-webkit-box;
  display:-ms-flexbox;
  display:flex;
  -ms-flex-flow: row nowrap;
      flex-flow: row nowrap;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.dot {
  display:inline-block;
  width:20px;
  height:20px;
  border-radius: 100%;
  transfrom:scale(0);
  -webkit-animation-name:scale;
          animation-name:scale;
          -webkit-animation-duration: .7s;
                  animation-duration: .7s;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
}

.d1 {
  -webkit-animation-delay: 0s;
          animation-delay: 0s;
  background-color:#4285F4;
}

.d2 {
  -webkit-animation-delay: 0.25s;
          animation-delay: 0.25s;
  background-color:#34A853;
}

.d3 {
  -webkit-animation-delay: 0.5s;
          animation-delay: 0.5s;
  background-color:#FBBC05;
}

.d4 {
  -webkit-animation-delay: 1s;
          animation-delay: 1s;
  background-color:#EA4335;
}

@-webkit-keyframes scale {
  
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
}

@keyframes scale {
  
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
}
</style>