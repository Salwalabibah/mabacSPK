<h3 class="relative mt-2.5 md:mt-0 text-center p-1 mb-7 font-bold text-[15px] md:text-lg md:beforee md:afterr">
    Nader
  </h3>
  <ul>
    <li class="{{ (request()->is('/')) ? 'active' : '' }}">
        <a class="link" href="{{route('home')}}">
            <i class="fa fa-tachometer"></i>
          <span class="span"> Dashboard</span>
        </a>
      </li>
    <li class="{{ (request()->is('kriteria')) ? 'active' : '' }}">
      <a class="link" href="{{route('kriteria.index')}}">
        <i class="fa-regular fa-chart-bar fa-fw"></i>
        <span class="span">Kriteria</span>
      </a>
    </li>
    <li class="{{ (request()->is('alternatif')) ? 'active' : '' }}">
      <a class="link" href="{{route('alternatif.index')}}">
        <i class="fa-regular fa-user fa-fw"></i>
        <span class="span">Alternatif</span>
      </a>
    </li>
    <li class="{{ (request()->is('penilaian')) ? 'active' : '' }}">
      <a class="link" href="{{route('penilaian.index')}}">
        <i class="fa-regular fa-file fa-fw"></i>
        <span class="span">Penilaian</span>
      </a>
    </li>
    <li class="{{ (request()->is('perhitungan')) ? 'active' : '' }}">
      <a class="link" href="{{route('perhitungan.index')}}">
        <i class="fa-solid fa-graduation-cap fa-fw"></i>
        <span class="span">Perankingan</span>
      </a>
    </li>
</ul>

