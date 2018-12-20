function GalleryController () {
  document.getElementsByClassName("close")[0].onclick = function() {
    document.getElementById('myModal').style.display = "none";
  }
  this.settings = {
    // Fullscreen images will scale to 90% of screen width and height
    scale_size: .90
  }
  this.numfiles = {
    Decks: 8,
    Floors: 10,
    GeneralRemodel: 13,
    PressureWash: 8
  }
  this.showModal = function(_img) {
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    modal.style.display = "block";
    modalImg.src = _img.src;
    this.scaleImage(_img);
  }
  this.scaleImage = function(_img) {
    var modalImg = document.getElementById("img01");
    let maxWidth = window.innerWidth * this.settings.scale_size;
        maxHeight = window.innerHeight * this.settings.scale_size;
    let imgWidth = _img.naturalWidth,
        imgHeight = _img.naturalHeight;
    let widthRatio = maxWidth / imgWidth,
        heightRatio = maxHeight / imgHeight;
    let bestRatio = Math.min(widthRatio, heightRatio);
    let newWidth = imgWidth * bestRatio,
        newHeight = imgHeight * bestRatio;
    modalImg.setAttribute("style","height:" + newHeight + "px;");
    modalImg.setAttribute("style","width:" + newWidth + "px;");
  }
  this.loadAlbum = function(name) {
    var columns = [];
    var files;
    for(var i = 1; i < 5; i++) {
      columns.push(document.getElementById("R" + String(i)));
      columns[i-1].innerHTML = '';
    }
    if(name == "Decks")
      files = this.numfiles.Decks;
    else if(name == "Floors")
      files = this.numfiles.Floors;
    else if(name == "GeneralRemodel")
      files = this.numfiles.GeneralRemodel;
    else if(name == "PressureWash")
      files = this.numfiles.PressureWash;

    for(var i = 0; i < files; i++) {
      columns[i % 4].innerHTML += '<img src="images/Gallery/' + name + '/' + i + '.jpg" class="rounded img-fluid mb-4 shadow" onclick="Gal.showModal(this)" alt="">';
    }
  }

  this.galResize = function() {
    var modalImg = document.getElementById("img01");
    this.scaleImage(modalImg);
  }.bind(this);

  window.addEventListener("resize", this.galResize);

  this.loadAlbum("Floors");
}
