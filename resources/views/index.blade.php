@extends('layouts.master')

@section('title', 'SAO | Home')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>

@endsection


@section('content')
<div class="row">


<div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="pull-right">

                                    <button class="btn btn-white btn-xs" type="button">S.Y. 2016-2017</button>
                                </div>
                                <div class="text-center article-title">
                                    <span class="text-muted"><i class="fa fa-clock-o"></i> 7th Oct 2016</span>
                                    <h1>
                                        STUDENT AFFAIRS OFFICE
                                    </h1>
                                </div>
                                <p>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The student Affairs Office (SAO) supports programs that encourage the concept of total student development. it is commited to provide an enviroment conducive to personal,social, emotional, spiritual, and organizational development through involvement in student governance and activities. it continues to plan, implement, evaluate, and support programs and services to meet students needs.<br><br>
                                </p>
                                
                                 <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The SAO offers services to the students in the following areas:

                                </p>
                                <i>
                                <p>

                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. <b>Student Welfare</b>
       
                                </p>

                                <p>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1. Orientation and Awareness


                                </p>

                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2. Student Handbook Development


                                </p>

                               <p>

                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. <b>Student Development</b>
       
                                </p>


                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.1. Student Organizations and Activities

                                </p>

                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2. Leadership Training


                                </p>                            
                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3. Student Government


                                </p>

                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4. Student Discipline


                                </p> 
                              <p>

                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. <b>Other Student Service</b>
       
                                </p>


                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1. Lockers

                                <p>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2  Lost and Found 


                                </p>  
                            </i>
<br><br><br>
<p>
        <h2><strong>Educational Philosophy</strong></h2>
<p><em>Lyceum of the Philippines University - Cavite</em>, an institution of higher learning, inspired by the ideals of Philippine President Jose P. Laurel, is committed to the advancement of his philosophy and values:</p>
<blockquote><em>"Veritas et Fortitudo" (truth and fortitude) "Pro Deo et Patria" (for God and Country).</em></blockquote>

</ol>
<h2><strong>Core Values</strong></h2>
<table style="width: 790px; height: 146px;" border="0" align="center">
<tbody>
<tr>
<td><span style="font-size: x-large;"><strong>L -</strong> Love of God</span></td>
<td><span style="font-size: x-large;"> </span></td>
<td><span style="font-size: x-large;"><strong>J -</strong> Justice</span></td>
</tr>
<tr>
<td><span style="font-size: x-large;"><strong>P -</strong> Professional Integrity</span></td>
<td><span style="font-size: x-large;"><strong>N -</strong> Nationalism</span></td>
<td><span style="font-size: x-large;"><strong>P -</strong> Perseverance</span></td>
</tr>
<tr>
<td><span style="font-size: x-large;"><strong>U -</strong> Unity</span></td>
<td><span style="font-size: x-large;"> </span></td>
<td><span style="font-size: x-large;"><strong>L -</strong> Leadership</span></td>
</tr>
</tbody>
</table>
<p> </p>
<p> </p>
  </p>

               
                
                
                











         
                                <hr>

                                <div class="pull-right">

                                    <button class="btn btn-white btn-xs" type="button">Team Acid</button>
                                </div>

  
                            </div>
                        </div>
                    </div>
                </div>


            </div>








<!-- 	<div class="col-lg-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h4>STUDENT AFFAIRS OFFICE</h4>
			</div>
			<div class="ibox-content">
            The student Affairs Office (SAO) supports programs that encourage the concept of total student development. it is commited to provide an enviroment conducive to personal,social, emotional, spiritual, and organizational development through involvement in student governance and activities. it continues to plan, implement, evaluate, and support programs and services to meet students needs.


           <p> The SAO offers services to the students in the following areas:
            1. Student Welfare
                1.1. Orientation and Awareness
                1.2. Student Handbook Development
            2. Student Development
                2.1. Student Organizations and Activities
                2.2. Leadership Training
                2.3. Student Government
                2.4. Student Discipline
            3. Other Student Service
                3.1. Lockers
                3.2  Lost and Found 
            </p>



			</div>

			<!-- <div class="ibox-footer">

			</div> -->
		</div>
	</div> -->


	<!-- <div class="col-lg-6 animated fadeInRight">
			<div class="ibox float-e-margins">
 <div class="ibox-title">
                            <h4>Lost and Found Statistics</h4>
                          
                        </div>
                        <div class="ibox-content">
                            <div class="flot-chart">
                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                            </div>
                        </div>

</div>
</div> -->

</div>








@endsection




