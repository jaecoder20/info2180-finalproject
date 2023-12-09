
<div class="dash-top"> 
  <h2>Dashboard</h2>
  <!-- <button class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</button> -->
  <a href="newContacts.php" class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</a>
</div>
<div class="content">
<div class="filters">
    <ul class="list-items">
        <li class="label-f"><img src="../docs/Puzzle.svg" alt=""><strong>Filter By:</strong></li>
        <li onclick="filterContacts('all')">All</li>
        <li onclick="filterContacts('Sales Leads')">Sales Leads</li>
        <li onclick="filterContacts('Support')">Support</li>
        <li onclick="filterContacts('Assigned to me')">Assigned to me</li>
    </ul>
</div>
<div id="contactsTable">
      <!-- The contacts table will be loaded here -->
  </div>
<script type="text/javascript" src="../scripts/getContact.js">
</script>
