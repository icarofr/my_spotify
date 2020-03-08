$.ajax({
  async: false,
  global: false,
  url: "/.temp.json",
  dataType: "json",
  success: function(data) {
    window.genreJson = data;
  }
});
let parsedGenres = [];

for (i = 0; i < genreJson.length; i++) {
  parsedGenres.push(
    React.createElement(
      "div",
      { class: "db genre-result" },
      React.createElement(
        "article",
        { class: "mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10" },
        React.createElement("div", { class: "tc" }, [
          React.createElement("img", {
            class: "br-100 h5 w5 dib",
            src: genreJson[i]["photo"]
          }),
          React.createElement(
            "a",
            {
              href:
                "genreSearchResults.php?genreSearch=" + genreJson[i]["name"]
            },
            React.createElement("h1", { class: "f4 link black grow no-underline" }, genreJson[i]["name"])
          )
        ]),
        React.createElement(
          "p",
          { class: "lh-copy measure center f7 black-70" },
          [
            [
              React.createElement("div", { class: "b f5" }, "ID:"),
              React.createElement("div", {}, genreJson[i]["id"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Description:"),
              React.createElement("div", {}, genreJson[i]["description"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Bio:"),
              React.createElement("div", {}, genreJson[i]["bio"])
            ],
            [
              React.createElement("div", { class: "b pt2 f5" }, "Albums:"),
              React.createElement("div", {}, genreJson[i]["genre_albums"])
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
        "Magically iterating through all your favorite genres."
      )
    ]),
    parsedGenres
  );
};
ReactDOM.render(React.createElement(App), document.getElementById("root"));
