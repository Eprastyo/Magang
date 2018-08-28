
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Nilai Planning Pekerjaan</label><br>
                          <input type="text" id="myInput" name="est_pendapatan" class="form-control">
                        </div>
                      </div>

<script type="text/javascript">
window.onload = attachEvents;

    function attachEvents() {
        document.getElementById('myInput').onkeyup = reformatNumber;
    }

    function reformatNumber() {
        // No error checking. Assumes only ever 1 DP per number
        var text = this.value;

        // Strip off anything to the right of the DP
        var rightOfDp = '';
        var dpPos = text.indexOf('.');
        if (dpPos != -1) {
            rightOfDp = text.substr(dpPos);
            text = text.substr(0, dpPos);
        }

        var leftOfDp = '';
        var counter = 0;
        // Format the remainder into 3 char blocks, starting from the right
        for (var loop=text.length-1; loop>-1; loop--) {
            var char = text.charAt(loop);

            // Ignore existing spaces
            if (char == ' ') continue;

            leftOfDp = char + leftOfDp;
            counter++;
            if (counter % 3 == 0) leftOfDp = ' ' + leftOfDp;
        }

        // Strip leading space if present
        if (leftOfDp.charAt(0) == ' ') leftOfDp = leftOfDp.substr(1);

        this.value = leftOfDp + rightOfDp;

    }

</script>