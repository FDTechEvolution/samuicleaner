<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Description of RecapComponent
 *
 * @author sakorn.s
 */

class RecaptchaComponent extends Component {
    
    public $site_key = "6LcJCQ4UAAAAAArpU65_vDiWERiGm49m_reZ2mzH";
    public $secret_key = "6LcJCQ4UAAAAAOXVRaFM8MuYbWIW6GTBuvwsWiCh";
    
    public function checkReCaptcha($cap = NULL) {
        if ($cap == NULL || $cap === '') {
            return false;
        } else {
            return true;
        }
        //'g-recaptcha-response' => '03AHJ_Vut99lfnwGo1oTfg1p0_SnK3Z6PxfDxPruboDJbGvGlOeCHRzSXB9BpDT1vTrIgb68-2mLrfD18KonrWZSepB2uLRRsW985Asue18vfcguD89K4FdqBI1EhPJVNvhs5n57xtPu_qcPhN5N6HjPAFKePgvzesRN1Wf4UXxp9fOgnF1OVXlg_hQhvj6mAhAHMae0u8fM4gJCtzb009GZtVjcPTAY6FSk8kZ3m79fPhJU7bX0-OQ202A-ctlF1FO6-H2CW5uzwWHudu3UswOaka0jYh2JmO9sBXJ74OyjALC1j-fziz3UnEQjO1pZXRey2W861sB8NOeCTbRePeP_SXgSazSTwc_PL9hhM_3ogYP2AZJHSpyn2d4DXj-FZBBw2pHagdpb3te-aCDftyquRt85-nLYFBzoemF1DRzLy6NMntskc23XoVjzihLZCvazktNl8Y54PC6-BWJnzPNe7puyWNZUXssYmzIaR7gaXLpCnWN9HbmDZfS1KkNCXUnybW1KmUPof4ckNCuAJV8DTq0kG9Xxie12gs2K3dU-UT25gJvLLCmnUf6IeWA5tW65iGiCj-hUvBnRNMaSETRtazbZst-f3M30hvPDCpY95kpaCyVpuUjRAx8jP5Z02hE8098H5YLpDYoRuLgH6wempwF3JZ9WJYuO3jK0f45j7Ooiv-p7hk2QsO8UEKRDB4hzagMxT9SBH0yf6-RUX5sYN5rwN-ei8lTwH6eIr9uFcijGxT9jWPy4qSYD2VjqBh7-KyS49zrhxMHJ_lZqA14tf57e_rXMhh7aw8s9-MC1g2HH4yOvMHJDXivsnSfujmr8dvmp-CvVzQ-2ukOTzCye7Fssu4d5Ul3EMlftC-DuDhhNWQ2niRRg8'
    }
}

?>
