<!DOCTYPE html>
<html>
<head>
  <title>Application de calcul de puissance</title>
  <style>
    /* Ajoutez ici le CSS pour la mise en page */
  </style>
</head>
<body>
  <h1>Application de calcul de puissance</h1>

  <h2>Liste des équipements disponibles :</h2>
  <ul id="equipments">
    <li data-type="emitter" data-power="50">Emetteur</li>
    <li data-type="fiber" data-attenuation="0.2">Fibre optique</li>
    <li data-type="wireless_link" data-attenuation="0.8">Liaison hertzienne</li>
    <!-- Ajoutez d'autres équipements ici -->
  </ul>

  <h2>Equipement sélectionné :</h2>
  <div id="selectedEquipment">
    <!-- Le contenu de l'équipement sélectionné sera affiché ici -->
  </div>

  <h2>Puissance reçue (pour le récepteur) :</h2>
  <p id="receivedPower">0 dBm</p>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      let selectedEquipment = null;

      // Gestion de la sélection d'un équipement
      $("#equipments li").click(function() {
        $("#equipments li").removeClass("selected");
        $(this).addClass("selected");
        selectedEquipment = $(this);
        displaySelectedEquipment();
        calculateReceivedPower();
      });

      // Affiche l'équipement sélectionné et ses paramètres
      function displaySelectedEquipment() {
        if (selectedEquipment) {
          let equipmentType = selectedEquipment.data("type");
          let equipmentDetails = "";

          switch (equipmentType) {
            case "emitter":
              let power = selectedEquipment.data("power");
              equipmentDetails = `Puissance d'émission : ${power} dBm`;
              break;
            case "fiber":
              let attenuation = selectedEquipment.data("attenuation");
              equipmentDetails = `Atténuation : ${attenuation} dB/km`;
              break;
            case "wireless_link":
              let attenuationLink = selectedEquipment.data("attenuation");
              equipmentDetails = `Atténuation liaison hertzienne : ${attenuationLink} dB`;
              break;
            // Ajoutez des cas pour d'autres types d'équipements
          }

          $("#selectedEquipment").html(`<p>${selectedEquipment.text()}</p><p>${equipmentDetails}</p>`);
        } else {
          $("#selectedEquipment").empty();
        }
      }

      // Calcule et affiche la puissance reçue
      function calculateReceivedPower() {
        if (selectedEquipment) {
          let equipmentType = selectedEquipment.data("type");
          let receivedPower = 0;

          switch (equipmentType) {
            case "emitter":
              let power = selectedEquipment.data("power");
              receivedPower = power - 2; // Exemple de calcul pour la puissance reçue
              break;
            case "fiber":
              let attenuation = selectedEquipment.data("attenuation");
              let length = parseFloat(prompt("Entrez la longueur de la fibre en km :"));
              receivedPower = -attenuation * length; // Exemple de calcul pour la puissance reçue
              break;
            case "wireless_link":
              let attenuationLink = selectedEquipment.data("attenuation");
              receivedPower = -attenuationLink; // Exemple de calcul pour la puissance reçue
              break;
            // Ajoutez des cas pour d'autres types d'équipements
          }

          $("#receivedPower").text(`${receivedPower} dBm`);
        } else {
          $("#receivedPower").text("0 dBm");
        }
      }
    });
  </script>
</body>
</html>
