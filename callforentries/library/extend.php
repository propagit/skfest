<?
class Extend
{
function roundUp( $value, $precision=0 ) {

			if ( $precision == 0 ) {
				$precisionFactor = 1;

			} else {
				$precisionFactor = pow( 10, $precision );
			}

    		return ceil( $value * $precisionFactor )/$precisionFactor;

		}
}
?>