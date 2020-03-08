$.ajax({
  async: false,
  global: false,
  url: "/.temp.json",
  dataType: "json",
  success: function(data) {
    window.albumJson = data;
  }
});
let parsedAlbums = [];

for (i = 0; i < albumJson.length; i++) {
  parsedAlbums.push(
    React.createElement(
      "div",
      { class: "db album-result" },
      React.createElement(
        "article",
        { class: "mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10" },
        React.createElement("div", { class: "tc" }, [
          React.createElement("img", {
            class: "br-100 h5 w5 dib",
            src: albumJson[i]["cover"]
          }),
          React.createElement(
            "a",
            {
              href: "albumSearchResults.php?albumSearch=" + albumJson[i]["name"]
            },
            React.createElement(
              "h1",
              { class: "f4 link black grow no-underline" },
              albumJson[i]["name"]
            )
          )
        ]),
        React.createElement(
          "p",
          { class: "lh-copy measure center f7 black-70" },
          [
            [
              React.createElement("div", { class: "b f5" }, "ID:"),
              React.createElement("div", {}, albumJson[i]["id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Artist id:"),
              React.createElement("div", {}, albumJson[i]["artist_id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Artist name:"),
              React.createElement("div", {}, albumJson[i]["artist_name"])
            ],
            [
              React.createElement(
                "div",
                { class: "b pt2 f5" },
                "Release date:"
              ),
              React.createElement("div", {}, albumJson[i]["release_date"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Popularity:"),
              React.createElement("div", {}, albumJson[i]["popularity"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Track list:"),
              React.createElement("div", {}, albumJson[i]["track_list"])
            ]
          ]
        )
      )
    )
  );
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
        "Magically iterating through all your favorite albums."
      )
    ]),
    parsedAlbums
  );
};
ReactDOM.render(React.createElement(App), document.getElementById("root"));
