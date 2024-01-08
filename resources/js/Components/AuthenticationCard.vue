<template>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 new-bg">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; z-index: 2;">
            <slot />
        </div>
    </div>
    <div class="stars" style="z-index: 1;">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        </div>

</template>

<style scoped>

.new-bg {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: radial-gradient(ellipse at bottom, #512da8 0%, #0c0d13 100%);
  overflow: hidden;
}

.stars {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 120%;
  transform: rotate(-45deg);
}

.star {
  --star-color: #ffffff;
  --star-tail-length: 6em;
  --star-tail-height: 2px;
  --star-width: calc(var(--star-tail-length) / 6);
  --fall-duration: 9s;
  --tail-fade-duration: var(--fall-duration);
  position: absolute;
  top: var(--top-offset);
  left: 0;
  width: var(--star-tail-length);
  height: var(--star-tail-height);
  color: var(--star-color);
  background: linear-gradient(45deg, currentColor, transparent);
  border-radius: 50%;
  filter: drop-shadow(0 0 6px currentColor);
  transform: translate3d(104em, 0, 0);
  animation: fall var(--fall-duration) var(--fall-delay) linear infinite, tail-fade var(--tail-fade-duration) var(--fall-delay) ease-out infinite;
}
@media screen and (max-width: 750px) {
  .star {
    animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
  }
}
.star:nth-child(1) {
  --star-tail-length: 5.05em;
  --top-offset: 54.42vh;
  --fall-duration: 9.643s;
  --fall-delay: 3.425s;
}
.star:nth-child(2) {
  --star-tail-length: 6.77em;
  --top-offset: 89.5vh;
  --fall-duration: 11.9s;
  --fall-delay: 5.4s;
}
.star:nth-child(3) {
  --star-tail-length: 6.63em;
  --top-offset: 16.87vh;
  --fall-duration: 7.895s;
  --fall-delay: 4.194s;
}
.star:nth-child(4) {
  --star-tail-length: 5.29em;
  --top-offset: 76.09vh;
  --fall-duration: 9.31s;
  --fall-delay: 1.767s;
}
.star:nth-child(5) {
  --star-tail-length: 6.03em;
  --top-offset: 39.68vh;
  --fall-duration: 7.612s;
  --fall-delay: 4.855s;
}
.star:nth-child(6) {
  --star-tail-length: 7.36em;
  --top-offset: 82.11vh;
  --fall-duration: 8.517s;
  --fall-delay: 1.55s;
}
.star:nth-child(7) {
  --star-tail-length: 6.34em;
  --top-offset: 4.26vh;
  --fall-duration: 11.793s;
  --fall-delay: 0.904s;
}
.star:nth-child(8) {
  --star-tail-length: 6.29em;
  --top-offset: 87.77vh;
  --fall-duration: 11.384s;
  --fall-delay: 6.507s;
}
.star:nth-child(9) {
  --star-tail-length: 5.06em;
  --top-offset: 24vh;
  --fall-duration: 11.672s;
  --fall-delay: 8.087s;
}
.star:nth-child(10) {
  --star-tail-length: 6.22em;
  --top-offset: 81.86vh;
  --fall-duration: 11.45s;
  --fall-delay: 9.474s;
}
.star:nth-child(11) {
  --star-tail-length: 5.38em;
  --top-offset: 62.82vh;
  --fall-duration: 8.532s;
  --fall-delay: 6.028s;
}
.star:nth-child(12) {
  --star-tail-length: 5.01em;
  --top-offset: 14.34vh;
  --fall-duration: 8.873s;
  --fall-delay: 6.467s;
}
.star:nth-child(13) {
  --star-tail-length: 7.22em;
  --top-offset: 33.4vh;
  --fall-duration: 6.971s;
  --fall-delay: 4.462s;
}
.star:nth-child(14) {
  --star-tail-length: 5.56em;
  --top-offset: 67.67vh;
  --fall-duration: 10.387s;
  --fall-delay: 9.944s;
}
.star:nth-child(15) {
  --star-tail-length: 5.7em;
  --top-offset: 50.34vh;
  --fall-duration: 6.388s;
  --fall-delay: 9.547s;
}
.star:nth-child(16) {
  --star-tail-length: 5.81em;
  --top-offset: 79.27vh;
  --fall-duration: 10.626s;
  --fall-delay: 9.893s;
}
.star:nth-child(17) {
  --star-tail-length: 6.29em;
  --top-offset: 34.87vh;
  --fall-duration: 7.556s;
  --fall-delay: 2.962s;
}
.star:nth-child(18) {
  --star-tail-length: 6.24em;
  --top-offset: 36.42vh;
  --fall-duration: 6.156s;
  --fall-delay: 9.89s;
}
.star:nth-child(19) {
  --star-tail-length: 6.7em;
  --top-offset: 99.07vh;
  --fall-duration: 8.668s;
  --fall-delay: 1.216s;
}
.star:nth-child(20) {
  --star-tail-length: 5.63em;
  --top-offset: 68.67vh;
  --fall-duration: 6.721s;
  --fall-delay: 0.751s;
}
.star:nth-child(21) {
  --star-tail-length: 5.22em;
  --top-offset: 56.17vh;
  --fall-duration: 6.899s;
  --fall-delay: 6.41s;
}
.star:nth-child(22) {
  --star-tail-length: 7.03em;
  --top-offset: 12.94vh;
  --fall-duration: 8.592s;
  --fall-delay: 7.201s;
}
.star:nth-child(23) {
  --star-tail-length: 7.19em;
  --top-offset: 84.9vh;
  --fall-duration: 8.266s;
  --fall-delay: 2.648s;
}
.star:nth-child(24) {
  --star-tail-length: 5.81em;
  --top-offset: 74.23vh;
  --fall-duration: 6.8s;
  --fall-delay: 4.127s;
}
.star:nth-child(25) {
  --star-tail-length: 5.23em;
  --top-offset: 68.83vh;
  --fall-duration: 6.09s;
  --fall-delay: 4.933s;
}
.star:nth-child(26) {
  --star-tail-length: 5.98em;
  --top-offset: 71.01vh;
  --fall-duration: 9.756s;
  --fall-delay: 6.094s;
}
.star:nth-child(27) {
  --star-tail-length: 5.19em;
  --top-offset: 54.02vh;
  --fall-duration: 8.088s;
  --fall-delay: 4.356s;
}
.star:nth-child(28) {
  --star-tail-length: 7.42em;
  --top-offset: 37.06vh;
  --fall-duration: 7.927s;
  --fall-delay: 1.546s;
}
.star:nth-child(29) {
  --star-tail-length: 6.97em;
  --top-offset: 1.44vh;
  --fall-duration: 11.898s;
  --fall-delay: 2.7s;
}
.star:nth-child(30) {
  --star-tail-length: 7.29em;
  --top-offset: 93.37vh;
  --fall-duration: 11.431s;
  --fall-delay: 1.957s;
}
.star:nth-child(31) {
  --star-tail-length: 6.3em;
  --top-offset: 88.99vh;
  --fall-duration: 11.2s;
  --fall-delay: 8.456s;
}
.star:nth-child(32) {
  --star-tail-length: 6.67em;
  --top-offset: 92.17vh;
  --fall-duration: 7.582s;
  --fall-delay: 3.063s;
}
.star:nth-child(33) {
  --star-tail-length: 6.67em;
  --top-offset: 12.28vh;
  --fall-duration: 7.739s;
  --fall-delay: 3.866s;
}
.star:nth-child(34) {
  --star-tail-length: 5.83em;
  --top-offset: 1.52vh;
  --fall-duration: 11.067s;
  --fall-delay: 2.369s;
}
.star:nth-child(35) {
  --star-tail-length: 6.21em;
  --top-offset: 50.76vh;
  --fall-duration: 9.074s;
  --fall-delay: 4.307s;
}
.star:nth-child(36) {
  --star-tail-length: 5.04em;
  --top-offset: 30.01vh;
  --fall-duration: 6.483s;
  --fall-delay: 8.969s;
}
.star:nth-child(37) {
  --star-tail-length: 7.02em;
  --top-offset: 28.79vh;
  --fall-duration: 8.67s;
  --fall-delay: 2.325s;
}
.star:nth-child(38) {
  --star-tail-length: 7.01em;
  --top-offset: 7.45vh;
  --fall-duration: 6.723s;
  --fall-delay: 0.378s;
}
.star:nth-child(39) {
  --star-tail-length: 5.09em;
  --top-offset: 47.97vh;
  --fall-duration: 6.813s;
  --fall-delay: 5.022s;
}
.star:nth-child(40) {
  --star-tail-length: 7.29em;
  --top-offset: 74.91vh;
  --fall-duration: 9.732s;
  --fall-delay: 8.114s;
}
.star:nth-child(41) {
  --star-tail-length: 5.71em;
  --top-offset: 24.92vh;
  --fall-duration: 11.203s;
  --fall-delay: 4.739s;
}
.star:nth-child(42) {
  --star-tail-length: 5.56em;
  --top-offset: 34.21vh;
  --fall-duration: 6.488s;
  --fall-delay: 6.725s;
}
.star:nth-child(43) {
  --star-tail-length: 6.32em;
  --top-offset: 11.22vh;
  --fall-duration: 9.036s;
  --fall-delay: 5.763s;
}
.star:nth-child(44) {
  --star-tail-length: 5.72em;
  --top-offset: 16.54vh;
  --fall-duration: 6.583s;
  --fall-delay: 0.153s;
}
.star:nth-child(45) {
  --star-tail-length: 7.28em;
  --top-offset: 75.29vh;
  --fall-duration: 9.064s;
  --fall-delay: 9.134s;
}
.star:nth-child(46) {
  --star-tail-length: 6.21em;
  --top-offset: 63.69vh;
  --fall-duration: 8.761s;
  --fall-delay: 3.693s;
}
.star:nth-child(47) {
  --star-tail-length: 5.78em;
  --top-offset: 42.11vh;
  --fall-duration: 7.602s;
  --fall-delay: 2.098s;
}
.star:nth-child(48) {
  --star-tail-length: 5.38em;
  --top-offset: 16.29vh;
  --fall-duration: 9.624s;
  --fall-delay: 8.581s;
}
.star:nth-child(49) {
  --star-tail-length: 6.58em;
  --top-offset: 83.36vh;
  --fall-duration: 11.648s;
  --fall-delay: 0.479s;
}
.star:nth-child(50) {
  --star-tail-length: 5.61em;
  --top-offset: 25.56vh;
  --fall-duration: 6.765s;
  --fall-delay: 4.088s;
}
.star::before, .star::after {
  position: absolute;
  content: "";
  top: 0;
  left: calc(var(--star-width) / -2);
  width: var(--star-width);
  height: 100%;
  background: linear-gradient(45deg, transparent, currentColor, transparent);
  border-radius: inherit;
  animation: blink 2s linear infinite;
}
.star::before {
  transform: rotate(45deg);
}
.star::after {
  transform: rotate(-45deg);
}

@keyframes fall {
  to {
    transform: translate3d(-30em, 0, 0);
  }
}
@keyframes tail-fade {
  0%, 50% {
    width: var(--star-tail-length);
    opacity: 1;
  }
  70%, 80% {
    width: 0;
    opacity: 0.4;
  }
  100% {
    width: 0;
    opacity: 0;
  }
}
@keyframes blink {
  50% {
    opacity: 0.6;
  }
}

</style>
