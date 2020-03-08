$.ajax({
  async: false,
  global: false,
  url: "/.temp.json",
  dataType: "json",
  success: function(data) {
    window.trackJson = data;
  }
});

for (i = 0; trackJson.length; i++) {
  $("#play" + i).on("click", function() {
    alert("a");
  });
}