@foreach($searchannuaireville as $villes)
@endforeach
@foreach($searchannuairedomain as $domain)
@endforeach
@foreach($searchannuairesecteur as $secteur)
@endforeach

@if(count($searchannuaireville) == 0 && count($searchannuairedomain) == 0 && count($searchannuairesecteur) == 0 )
<?php $allanns = \App\Annuaire::get(); ?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>جميع المدن</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع التخصصات</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع الأنواع</span>
	</div>
	@foreach($allanns as $allann)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allann->res_fr_name}}</p>
				<p class="platter">{{$allann->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allann->full_ar_name}}</h1>
				<h1 class="frtext">{{$allann->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 1 && count($searchannuairedomain) == 0 && count($searchannuairesecteur) == 0 )
<?php $allvilles = \App\Annuaire::where('ville','=',$villes->ville)->get(); ?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$villes->ville}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع التخصصات</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع الأنواع</span>
	</div>
	@foreach($allvilles as $allville)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allville->res_fr_name}}</p>
				<p class="platter">{{$allville->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allville->full_ar_name}}</h1>
				<h1 class="frtext">{{$allville->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 0 && count($searchannuairedomain) == 1 && count($searchannuairesecteur) == 0 )
<?php $alldomains = \App\Annuaire::where('domain','=',$domain->domain)->get(); ?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>جميع المدن</span>
		<span>&nbsp;>&nbsp;</span>
		<span>{{$domain->domain}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع الأنواع</span>
	</div>
	@foreach($alldomains as $alldomain)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$alldomain->res_fr_name}}</p>
				<p class="platter">{{$alldomain->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$alldomain->full_ar_name}}</h1>
				<h1 class="frtext">{{$alldomain->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 0 && count($searchannuairedomain) == 0 && count($searchannuairesecteur) == 1 )
<?php $allsecteurs = \App\Annuaire::where('secteur','=',$secteur->secteur)->get(); ?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$secteur->secteur}}</span>
		<span>&nbsp;<&nbsp;</span>
		<span>جميع المدن</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع التخصصات</span>
	</div>
	@foreach($allsecteurs as $allsecteur)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allsecteur->res_fr_name}}</p>
				<p class="platter">{{$allsecteur->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allsecteur->full_ar_name}}</h1>
				<h1 class="frtext">{{$allsecteur->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 1 && count($searchannuairedomain) == 1 && count($searchannuairesecteur) == 0 )
<?php 
	$vidos = ['ville'=>$villes->ville,'domain'=>$domain->domain];
	$allvidos = \App\Annuaire::where($vidos)->get(); 
?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$villes->ville}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>{{$domain->domain}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع الأنواع</span>
	</div>
	@foreach($allvidos as $allvido)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allvido->res_fr_name}}</p>
				<p class="platter">{{$allvido->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allvido->full_ar_name}}</h1>
				<h1 class="frtext">{{$allvido->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 1 && count($searchannuairedomain) == 1 && count($searchannuairesecteur) == 1 )
<?php 
	$vidoses = ['ville'=>$villes->ville,'domain'=>$domain->domain,'secteur'=>$secteur->secteur];
	$allvidoses = \App\Annuaire::where($vidoses)->get(); 
?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$secteur->secteur}}</span>
		<span>&nbsp;<&nbsp;</span>
		<span>{{$villes->ville}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>{{$domain->domain}}</span>
	</div>
	@foreach($allvidoses as $allvidose)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allvidose->res_fr_name}}</p>
				<p class="platter">{{$allvidose->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allvidose->full_ar_name}}</h1>
				<h1 class="frtext">{{$allvidose->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 0 && count($searchannuairedomain) == 1 && count($searchannuairesecteur) == 1 )
<?php 
	$doses = ['domain'=>$domain->domain,'secteur'=>$secteur->secteur];
	$alldoses = \App\Annuaire::where($doses)->get(); 
?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$secteur->secteur}}</span>
		<span>&nbsp;<&nbsp;</span>
		<span>جميع المدن</span>
		<span>&nbsp;>&nbsp;</span>
		<span>{{$domain->domain}}</span>
	</div>
	@foreach($alldoses as $alldose)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$alldose->res_fr_name}}</p>
				<p class="platter">{{$alldose->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$alldose->full_ar_name}}</h1>
				<h1 class="frtext">{{$alldose->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@elseif(count($searchannuaireville) == 1 && count($searchannuairedomain) == 0 && count($searchannuairesecteur) == 1 )
<?php 
	$vises = ['ville'=>$villes->ville,'secteur'=>$secteur->secteur];
	$allvises = \App\Annuaire::where($vises)->get(); 
?>
<div class="row fullanns">
	<div class="annuairederictory">
		<span>{{$secteur->secteur}}</span>
		<span>&nbsp;<&nbsp;</span>
		<span>{{$villes->full_ar_name}}</span>
		<span>&nbsp;>&nbsp;</span>
		<span>جميع التخصصات</span>
	</div>
	@foreach($allvises as $allvise)
	<div class="col s12 m6 l4 right annshidmar">
		<div class="row infobox">
			<div class="col s4 smalltext right">
				<p>{{$allvise->res_fr_name}}</p>
				<p class="platter">{{$allvise->ville}}</p>
			</div>
			<div class="col s8 textinfo">
				<h1 class="artext">{{$allvise->full_ar_name}}</h1>
				<h1 class="frtext">{{$allvise->full_fr_name}}</h1>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endif
