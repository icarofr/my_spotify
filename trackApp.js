$.ajax({
  async: false,
  global: false,
  url: "/.temp.json",
  dataType: "json",
  success: function(data) {
    window.trackJson = data;
  }
});
let parsedTracks = [];

for (i = 0; i < trackJson.length; i++) {
  parsedTracks.push(
    React.createElement(
      "div",
      { class: "db track-result" },
      React.createElement(
        "article",
        { class: "mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10" },
        React.createElement("div", { class: "tc" }, [
          React.createElement(
            "a",
            { id: "play" + i },
            React.createElement("img", {
              class: "br-100 h3 w3 dib",
              src: "play.png"
            })
          ),
          React.createElement(
            "a",
            {
              href: "trackSearchResults.php?trackSearch=" + trackJson[i]["name"]
            },
            React.createElement(
              "h1",
              { class: "f4 link black grow no-underline" },
              trackJson[i]["name"]
            )
          )
        ]),
        React.createElement(
          "p",
          { class: "lh-copy measure center f7 black-70" },
          [
            [
              React.createElement("div", { class: "b f5" }, "ID:"),
              React.createElement("div", {}, trackJson[i]["track_id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Name:"),
              React.createElement("div", {}, trackJson[i]["track_name"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Album id:"),
              React.createElement("div", {}, trackJson[i]["album_id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Album name:"),
              React.createElement("div", {}, trackJson[i]["album_name"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Artist id:"),
              React.createElement("div", {}, trackJson[i]["artist_id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Artist name:"),
              React.createElement("div", {}, trackJson[i]["artist_name"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Track no:"),
              React.createElement("div", {}, trackJson[i]["track_no"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Duration"),
              React.createElement("div", {}, trackJson[i]["duration"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, ".mp3"),
              React.createElement("div", {}, trackJson[i]["mp3"])
            ]
          ]
        )
      )
    )
  );
  $("#play" + i).on('click', function() {
    alert('a');
  });
}

const App = () => {
  return React.createElement(
    "div",
    { class: "avenir bg-washed-green" },
    React.createElement("div", { class: "bg-green pv5 tc white" }, [
      React.createElement("div", { class: "f1" }, "Stupefy!"),
      React.createElement(
        "div",
        { class: "f5" },
        "Magically iterating through all your favorite artists."
      )
    ]),
    parsedTracks
  );
};
ReactDOM.render(React.createElement(App), document.getElementById("root"));
