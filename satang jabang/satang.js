

const videoSelect = document.getElementById('select');
const video = document.getElementById('videos');
const source = document.getElementById('source');

function videoChange() {
  console.log('changed')
    var value = videoSelect.value;
    source.setAttribute('src/', value);
    video.load();
    console.log('src/'.concat(value));
  }

videoSelect.addEventListener("change", videoChange);
document.onload = videoChange();
