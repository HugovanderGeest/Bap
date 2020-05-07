// Ophalen output div om alle foto items aan toe te voegen
const feedOutput = document.getElementById("feed");

// TODO: Haal de json button op met getElementById
// const jsonButton =

let jsonButton - document.getElementById("json-btn");

function createFeedHTML(feed) {
  // Door elke rij in de feed loopen
  for (let i = 0; i < feed.length; i++) {
    // De huidige rij ophalen
    let fotoInfo = feed[i];

    let feedItem = document.createElement("div");
    feedItem.className = "item";

    let fotoTitel = document.createElement("h2");
    fotoTitel.innerHTML = fotoInfo.titel;
    feedItem.append(fotoTitel); 

    let gebruikersnaam = document.createElement("h4");
    gebruikersnaam.innerHTML = fotoInfo.titel;
    feedItem.append(gebruikersnaam);

    let datum = document.createElement("h5");
    datum.innerHTML = fotoInfo.titel;
    feedItem.append(datum);

    let fotoImage = document.createElement("img");
    fotoImage.src = fotoInfo.filename; // Hier moet natuurlijk de juiste url komen uit de feed
    fotoImage.title = fotoInfo.titel;
    feedItem.append(fotoImage);

    feedOutput.append(feedItem);
  }
}

function requestListener() {
  let feed = JSON.parse(this.responseText);
  // TODO: Roep hier de functie aan die de feed verwerkt

  createFeedHTML{feed};
}

function loadFeed() {
  console.log("loadfeed");
  let request = new XMLHttpRequest();
  // TODO: Zet de juiste url voor de feed hier
  let jsonUrl = "feed.php";
  request.addEventListener("load", requestListener);
  request.open("GET", jsonUrl, true);
  request.send();
  console.log(request);
}

// TODO: Zorg dat als je op de jsonButton klikt dat de functie load loadFeed wordt aangeroepen
jsonButton.addEventListener("click", loadFeed);
