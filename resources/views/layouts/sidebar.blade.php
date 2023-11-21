<h3 class="relative mt-2.5 md:mt-0 text-center p-1 mb-7 font-bold text-[15px] md:text-lg md:beforee md:afterr">
    Nader
  </h3>
  <ul>
    <li>
      <a class="link active" href="{{route('kriteria.index')}}">
        <i class="fa-regular fa-chart-bar fa-fw"></i>
        <span class="span">Kriteria</span>
      </a>
    </li>
    <li>
      <a class="link" href="{{route('alternatif.index')}}">
        <i class="fa-regular fa-user fa-fw"></i>
        <span class="span">Alternatif</span>
      </a>
    </li>
    <li>
      <a class="link" href="{{route('penilaian.index')}}">
        <i class="fa-regular fa-file fa-fw"></i>
        <span class="span">Penilaian</span>
      </a>
    </li>
    <li>
      <a class="link" href="profile.html">
        <i class="fa-regular fa-user fa-fw"></i>
        <span class="span">Profile</span>
      </a>
    </li>
    <li>
      <a class="link" href="projects.html">
        <i class="fa-solid fa-diagram-project fa-fw"></i>
        <span class="span">Projects</span>
      </a>
    </li>
    <li>
      <a class="link" href="courses.html">
        <i class="fa-solid fa-graduation-cap fa-fw"></i>
        <span class="span">Courses</span>
      </a>
    </li>
    <li>
      <a class="link" href="friends.html">
        <i class="fa-regular fa-circle-user fa-fw"></i>
        <span class="span">Friends</span>
      </a>
    </li>
    <li>
      <a class="link" href="plans.html">
        <i class="fa-regular fa-credit-card fa-fw"></i>
        <span class="span">Plans</span>
      </a>
    </li>
  </ul>
<script>
    $(document).ready(function () {

        $("#sidebar").mCustomScrollbar({
             theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            // and also adjust aria-expanded attributes we use for the open/closed arrows
            // in our CSS
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

    });
</script>
