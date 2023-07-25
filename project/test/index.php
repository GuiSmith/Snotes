<!-- HTML -->
<button id="exportPdfButton">Export to PDF</button>

<style>
  p {
    text-align: justify;
    text-indent: 2rem;
    width: 80%;
    margin: 0 auto;
  }
</style>

<div id = "nodeToExport">
  <h2 style = "text-align: center;" >Título</h2>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean enim enim,
    ullamcorper at sapien vitae, dapibus malesuada elit. Nulla maximus sem vitae
    nisl semper malesuada. Fusce dapibus lectus sed dolor maximus, convallis
    consequat eros molestie. Nulla sodales interdum nunc, vel elementum tellus
    convallis nec. Morbi posuere molestie ultricies. In vitae dui ullamcorper,
    tristique nulla vel, molestie leo. Vivamus et nisl sed urna congue aliquet
    aliquet at neque. Phasellus quis aliquam lectus. Vestibulum vitae accumsan
    eros, a malesuada nisl. Cras hendrerit vehicula nisl, nec lobortis neque
    commodo ac. Nulla pretium ligula vitae dolor ultricies mollis.
  </p>
  <p>
    Suspendisse venenatis nisl at quam faucibus laoreet. Vestibulum porta, diam
    at eleifend sollicitudin, leo nisl vehicula ex, pretium accumsan turpis nibh
    a nibh. Fusce sed dui sagittis, imperdiet neque sed, venenatis eros.
    Vestibulum consequat libero diam. Nam faucibus turpis eget lacinia malesuada.
    Curabitur diam diam, cursus nec urna non, egestas consectetur enim. Donec
    volutpat lobortis leo nec volutpat. Morbi ut feugiat enim. Integer finibus
    pellentesque dolor, ut egestas turpis maximus sed. Pellentesque tempor augue
    ex, id vehicula enim sagittis vel. Morbi lectus sem, interdum ac ipsum vitae,
    tristique porta velit.
  </p>
  <p>
    Sed vel blandit sem, nec placerat ante. Vivamus lobortis fringilla varius.
    Integer mi metus, feugiat vel massa sit amet, finibus imperdiet quam. In
    iaculis eros eget fermentum pellentesque. Phasellus vitae augue tincidunt,
    volutpat elit nec, scelerisque orci. Mauris cursus tincidunt suscipit.
    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
    cubilia curae; Quisque auctor odio nec lacus bibendum porta. Nam viverra
    mattis neque ac gravida.
  </p>
  <p>
    Aliquam elementum scelerisque malesuada. Orci varius natoque penatibus et
    magnis dis parturient montes, nascetur ridiculus mus. Mauris nec tincidunt
    magna. Fusce dolor nibh, ullamcorper vel mattis eu, consectetur eget tellus.
    Vivamus vitae felis quis risus suscipit dignissim vitae sit amet elit.
    Aenean tincidunt massa eu neque feugiat iaculis. Curabitur dignissim est
    massa, sit amet facilisis lacus porttitor nec. Cras porttitor leo ut nunc
    aliquet vehicula. Aliquam gravida, justo in vestibulum fringilla, nulla
    tortor placerat arcu, nec consequat purus libero quis nisl. Praesent maximus
    mollis metus eget feugiat. Suspendisse eget accumsan dui. Curabitur lectus
    lectus, lobortis sed malesuada dignissim, tristique sed lacus. Sed sit amet
    vehicula sem, vitae eleifend turpis. Integer a convallis elit. Nullam eget
    diam fringilla, rhoncus tellus non, viverra ligula. Morbi elementum, purus
    in molestie pulvinar, felis velit mattis lectus, rhoncus efficitur tortor
    odio quis mauris.
  </p>
  <p>
    Nulla sem libero, pretium et accumsan non, tincidunt et augue. Praesent vitae
    risus nec lacus sodales facilisis sit amet ac dui. Proin id justo purus. Proin
    ac erat non erat dignissim efficitur nec vitae ipsum. Nunc a ornare sapien.
    Suspendisse ut diam vel mi sodales viverra. Sed commodo purus vehicula ipsum
    mollis pharetra.
  </p>

</div>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
  document.getElementById("exportPdfButton").addEventListener("click", function () {
    const elementToExport = document.getElementById("nodeToExport"); // Replace 'nodeToExport' with the ID of the specific node you want to export
    const opt = {
      margin: 10,
      filename: "exported_node.pdf",
      image: { type: "jpeg", quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
    };

    html2pdf().from(elementToExport).set(opt).save();
  });
</script>
