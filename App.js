$.ajax({
  async: false,
  global: false,
  url: "/.temp.json",
  dataType: "json",
  success: function(data) {
    window.artistJson = data;
  }
});
let parsedArtists = [];

for (i = 0; i < artistJson.length; i++) {
  parsedArtists.push(
    React.createElement(
      "div",
      { class: "db artist-result" },
      React.createElement(
        "article",
        { class: "mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10" },
        React.createElement("div", { class: "tc" }, [
          React.createElement("img", {
            class: "br-100 h5 w5 dib",
            src: artistJson[i]["photo"]
          }),
          React.createElement("h1", { class: "f4" }, artistJson[i]["name"])
        ]),
        React.createElement(
          "p",
          { class: "lh-copy measure center f7 black-70" },
          [
            [
              React.createElement("div", { class: "b f5" }, "ID:"),
              React.createElement("div", {}, artistJson[i]["id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Description:"),
              React.createElement("div", {}, artistJson[i]["description"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Bio:"),
              React.createElement("div", {}, artistJson[i]["bio"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Albums:"),
              React.createElement("div", {}, artistJson[i]["artist_albums"])
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
    { class: "avenir" },
    React.createElement("div", { class: "bg-green pv5 tc white" }, [
      React.createElement("div", { class: "f1" }, "Stupefy!"),
      React.createElement(
        "div",
        { class: "f5" },
        "Magically iterating through all your favorite artists."
      )
    ]),
    parsedArtists
    // React.createElement("p", {}, "caralho")
  );
};
ReactDOM.render(React.createElement(App), document.getElementById("root"));
