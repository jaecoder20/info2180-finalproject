<div class="dash-top"> 
  <h2>New Contact</h2>
</div>
<div class="content">
  <form action="#" method="post">
  <div class="input-containers">
      <label class="input-labels" for="title">Title</label>
      <select name="roles" name="title" required>
        <option value="mr">Mr.</option>
        <option value="ms">Ms.</option>
        <option value="mrs">Mrs.</option>
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="fname">First Name</label>
      <input type="text" placeholder="Jane" name="fname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="lname">Last Name</label>
      <input type="text" placeholder="Doe" name="lname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="email">Email</label>
      <input type="email" placeholder="dummyemail@example.com" name="email" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="telNum">Telephone</label>
      <input type="tel" name="telNum" placeholder="e.g. 876-999-1234" required pattern="^\d{3}-\d{3}-\d{4}$" title="876-999-1234">
    </div>
    <div class="input-containers">
      <label class="input-labels" for="company">Company</label>
      <input type="text" placeholder="" name="company" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Type</label>
      <select name="roles" name="type" required>
        <option value="salesLead">Sales Lead</option>
        <option value="support">Support</option>
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Assigned To</label>
      <!--@Mikes - same scenario as getting out contacts from the database using a for loop and listing them. -->
      <select name="roles" name="role" required>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
    </div>
    <input type="submit" name="submit" class="form-submit" value="Save">
  </form>
</div>