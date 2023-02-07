<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Turing machine</title>

        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-4 flex flex-col items-center justify-center">
                <div class="text-4xl font-bold text-red-700">Turing machine</div>
                <div>
                    <a class="text-blue-700 hover:text-red-700 underline hover:no-underline" href="{{ route('preview') }}">Пример работы сервиса</a>
                </div>
                <div>
                    API: <a class="text-blue-700 hover:text-red-700 underline hover:no-underline" href="{{ route('api.word') }}">{{ route('api.word') }}</a>
                </div>
            </div>

        </div>

        <div id="audiodiv" >
            <audio id="audio_player" src="data:audio/mp3;base64,SUQzBAAAAAAAI1RTU0UAAAAPAAADTGF2ZjU3LjU2LjEwMAAAAAAAAAAAAAAA//tUxAADB7BFCEyYZMEqiOLJtgxwAACwWuaDQcYziOxoYeTgECIMw+AYv+E7ohfBAYxOD78MT/4IOyZOHyBRz1h9QJ9BfplHBj/vD/+/ygYk1vQADzBIAFLqFazQMRIZ4pPEyfF69hv3MYWRVeQojAeD5QoEQePsYaA4gVDAgMsYEXrFQofSLAc2D5kUYOUEhjjIIl0qJ/6Kvq1/9CoDJABADhncqGpgHhjAZOAUkecIHDgfv/UvKRRbnbZ+02Gk//tUxBECCThNGO0wwIEclKNpswz4jblCjTTjbwSaJSSREpbgmZDZtQTMNpUFRZQ4UMOJvNvX//2+nfuUQBZEEECQEQ4GD1/0sQo5fS6zEYUz9eh1nwtM9ArwbNlmyI4bjSEiF8L8WT+TFC3tp5U70yEKfLmR8D2oWumpIz//R9dqPt/XAM16YNpBX3cCItmS5rCRooIRZl4nIfJwxMirpIFzgFFA1rx6eSA9MjdbB09GrY/So3FGc1LGrUJpkeey//tUxB4Ay0DxFC2kxsFBGGMhthi5+8nmHf53l0TrSTndGMR5+U9Xpr6i3cwMi807/2/qBAUIwWQAAVTv5DixCb0JrEhkta4etFd2IuVs1CdDAWKDgrnzzwAA6tj4nwgRZcF4vmPdM8Z9vM8KZond52O5WLU0bmbdoH1qJSuiJOqA6r8VNKLBdVKps0LgGRUuVHItCwYBBOlgtkDiW8QaRRpd6XwYe27aKkNxewIMcgwECbOkE1i6TyfISE2vmZcH//tUxB4CiXDfFg0YackpGmMZlIx4VbWclMkzbUmdAVKaTpDoqQHnh2ByXbxJBUiJU0kQqElkLCjkptEeRsQUCw8MAnTc1WgjN7FY6+eRm0d+NSmnrwlFGJhXONmmdXeN9egzIfDR4AhWlrv/r/+tAR8D2GPScC4iC+NI3GpLJm68ry3VL3sJOYgYeC/HHrLbqTUtk8ykEKU5bQf7euupxGPuo23tPKu9LZ/UbWz72VrxWW2YulY8tN9rPqPbMzkQ//tUxCiDycDtFA0ww8k6myMCtmABVYS6LvW6TwTkOy+mvXa1y9LZuARhQwwyUEILmJ4s91DFFSgpsurPbcg+52z636z+PuvcI4YhLGO7T6yl29Om+Rfl0MnoeRWA8jMfWgA2nGm3HIpESikCgAAAEoyE6E4aTWZk265F/xhwyhm3L5l3TDDUM7QwXOICi/Odj4nFNmsZeVANFqecl0uyBxBQCJsppb9S/EJNXoaMBXTpZsmA0Tfc/y/n4/vrisHg//tUxC+AEXDxKbmcAAHXmiWzMPABuAmmMMwz/X5d7+ucw0+rL3hUDWu3i8Ob/////v9z33qlik2yrXaZG4w2//kABLLK47aSq+q0QACy74lxqIjRYTBao6zotPgFl7DG3p2yO23E6XR/Lm4yS5yOEAwVIkj9L86U1Z4MCzMV6RVsDbqTxqNblAg1hMLaqVcosUrat9br/iRXq5ibYzLvcSLXcPW9xn0aMzP2pSwk85Qc57oiLmdAlamaWqqqphQA//tUxAQACkyVLTmEgAldnOYXMLAAACFLOA/U0MofynlNi1TT83Ws3uXMaZ6KBmyhttuklGxkouzbDYjpE3ehWE6oeY2LENm2s19vP4RtvehCAgqk7unaZ3mbMU77Dn4D/6bCADTaJGmiVfF8+XbcxqtjzKkxfJqauaknLmFg/jtH/LS1NhgHgDQBCicVqIX0Sx9L2Pj9k1DK2QyNw7+YiojfFcZgTHpuUNOq7i/Yz495yATJ/R5d1mtu1lsbSjUb//tUxASACoTHabjEABFclev/mJABjdYtAACI4IHnp44vREo7PaUOlzdQ/F0YZUgLgrD4cVvGH8HDDh0IHjkGYdnD1h7/TtKTmHlK9NKzK0y8SkS9dP9+hAIky54Xv5T1ztblXMEYCiUoAWCCJg4iHYDBmNA9tDMrlgVJrRaxPwh46xBnfsGPI5SBlC+AgoUQ1HsI4gIFZ4m23NBe9i1kBhHAkVbt8F0EdmvO0AxgAAw5X9sIHRx/VYuGk3dUAAAF//tUxAQAipzJYeYky4FBni18wYsYQAuBAwKyanjw7P85O2lFLYpzFqX/s152oQkbBoQEAoFZOBucro87CoP3e8FQ8RRpNaooyBXTGOBk0CBQai21DFLe1WnB6cCFaEWdJhWdGTWUyiFwBCHQHRQrMgTJhy6WzsOT4pJ1SKdXMUXki3X59t6Arn1VloqodtVgKEMh6SHDQZikNlh75BH4JQWzEsOX1Z/ynTttT20PMDFSJhXfX3SEgAAFYBsi+FLD//tUxAaACyirbaewadFFla708w3iqLAGrLg/G4QkQxkAAQSrU4cYPUHqv7aWoYLGC8CAnwPX+FhDWYLENRBknyjZJfI2Yh0EiKCYBNdS6MQUCu4GRdzGKqbOtMTn6wkC5G+//6NAolOcKRKkcji/oItpXnOY5gHihaebY6fcnEN1HjaqGmIKMR0P682YXETdpRz//7Wm6qIuI95wgcUqHCSSQQNg6I0EptiImcaE5j+KpIJ4Z3d2QxCSLd4TeFis//tUxAaAijCteewkatFFHe31gw2y4UXZw+ig7pMyiDcW+AcQgM4qg707eqQTusWhXyw5mAMMpFljVSythXUNmV6X9Xygd64ukQbDwZCgFLKGV01BoNINL/j3bfdESnOIBM4x+5dgvWtCUtOYC80JlsOy6VLEDv15ZIjmNVQkpJ3SfCzPc0C59zWWsOHN16XtVK7LlspnTUjMj/akoq6Uv5fnD5wcNLOs/AOiSGlkhCAAA3LwE7DNgA8czNnuzpFP//tUxAqACVxXZ+3kwwEnnS41pIj7PMe3RTfpv5XK11PTAAGmDwXRPFix58YuXXe77PoXpMTmm9OhqnrIFBZl0ODBpBImjFnuy1UaG+VGQCFG5QKyaSDoMMChcnVmXOK7MzNqh8UtG0D9mbObLfHrce19+N1ckiqGO/77zq6KoMSraeX7WoqTp2RHzyFVyMrnRoLEACIENSJMoKOSAQRd1QHSRs4i/KxNqdHKRsNDHWOGzAaIVEIVvJZaqkT6yjaO//tUxBWACVS7caekS1kkm23xhgy3c5QAEJZ/3WjUQSFhjP/3slVYiMoQw4yeRIrhv6qK3MoguNOIGZglQYx3kz1H6McWxkaAaGZm8gxnhuZE5uzzqiGzJMmGKzpMowELrH/+iF1z7Qe3//50j/06oqCrG0/jqkOidOCspnfqAKC0gFN0DAAkaShsxVT61oDc9pUrYveyhIBzEApqCdQps8XQUDIHS8/KZZzhrz/+2l9nAgQ7fumVW9knCuatqKtY//tUxCEACVzrYUwYTZkcHS0w9I1eScSpkHozjHb6AFGXaxW3CUMUzUYOaxNTRCvGGTNVjSbBKTrEYhbWOtwUipflBVRmMQMlUQ3///kVOgdJTkuZzqF2TMiV15J/5zPWy870Q5MAKMuWElJqAYGQk0CUbwxDAJ+ax0qQ4V30trF2vzzWeyuxtUFxj0tQeJCoFt+t6GUjB4BSOrJeqPr2fwo/80+zub4UqEIJJygu47AAG4EBN0DIQ3JQkRQIRVJi//tUxC2ACVDra6eUc3kxnStphgk7jtvHojEoWkJh5XZuOBIrV26sH3nqw+bse/9OZbFCQTv//dgodSER3atiM6WalWbd/RSqzmDOch7Ew4tCAJTLkiJSagGiYNbg0lwMDdASk8CuBBcYxwoYPPvcq8UTuanQHRI9Gq7EFuf/5zqcUdCpfXZU7Ve50f9pDsdFDFFQjM54eUf8ceCAUk4wanCQtowUutFzFhPNHOD84lG2nIa7ex2TLJ0cZ53FZ6s0//tUxDeACSzpb6YkTTkrEO2w8wnvyWZszsmAui2/+/UKscpQIVTd6DG6egAM4+3/9f5P6HirJwDfR9UAJbgAk3ALiBFAxxxwiulvWnJUIvbivspJGR8r4yobbxLroW2WcYcMd4fW44UOzf9coOOGv/7oRGOaZDmcl/9bVUcirIcEgIbGm0pDLejCJSQI8SvYDpeI8+kKVGiYAINF1nu1QTER8ARQAJZZeyuln//+hk7KZN//9lQzVqUuf//+TWHH//tUxEKAyNDpaUeYUpEVHS0g9I2TRRZTuKB79QAdAACbVAbAiKgo2CRqNrCDxn4eMu1EIKigoaPgLeIh+Zs0tkd4aNcWSsP7Sdm0d6NAzCUf/oZWaJQwlKOlssJQOYs+WGHg0WYeFzdJdCAFxuAA4g6gTo+TlIKQBXMpTmwfE563eWbPs1VMWNZEQFCjOVmo5okc4P/6VZ0AhwNxzC3v/keqDHWBav/n5ngZ9Fg7b8x6ABTcIAKjjuEImxXtKFji//tUxFIACXyJX0wwScEjEe0o9gkjOedJrLKpV9EwXqwfS0xw4fu0zu7vJuPtbW1SQorXf/zXoiIn/1I1DO+6Mr/ojnPVDqzZCo6ESggv7zAD1iAOxuAZH8WJMKkojSUxeIY8bNI7OkqvtUlUc6qt5Gkkqstx9UoKQ6KZr73fvhOKeiRIOAg/xxF5h4i9guYSSSsXAgqFy1UJTWtElKxlAUL8LcUxFHKhpYBwnGY7yG6QNXF7azcBHmctUbIroRE7//tUxF0ACTz9aaeYTxEdEKyo9KEiiRIlp/+VNFyvc8GbTcqVv51/k7kS0/9HPdlbo7QUqDKOgA6+EAhStIANgAaEJDBJwSZCpDiP4vxzFccRzJKkKzRpUS7KlmeRGjKFWOVKzGFmAqbVyOzf3EhIcE6/gHNg0B0HFyt51QNA29oAWfMgIN6yAEAguVRgu0vmCGvTT/wNNuC9r6P0mCoGmgQ4FOSLUbDF3hJkdn06J2hsxnu7gi/+yOkjGIRp9dGa//tUxGmACST1a6eMsfknESr09JWkqoWjK17K3q9VdasS4uFgCb6QFDfWUAQYI6YwoRSzoojR4wbhKNE5hEVUgTENLlBtZuVHzANIWJZ55K6XkISVKSiR5AxPHZ6Fjlq+6ECN7bcp4KRx92Pvdvztt3G+tQEAABhgocbVHGFhZnZoa0lGKC6ZCmqwzrOzFndpn5tQ7PSqIv1AjrhQBh6HWXotVp6OCGYgUghSSUscOA2kPHEGwsabUFDYQ/UV7Yyv//tUxHWACczzU6wYTYk9Dmr09iTJR+6E1VN/v1+6jXx5Sbf5yzIdnzHMNGnDQszc3CjWUTOnUTa+4egaYMAcJqUIf60pAWYAABACAQsmp8aQAUxA34FCcRW+IP1IH7fSPyKKRutcsw3Hn9ako8BkHVfhg62E9U+xQRnjwuO09uDw0cIfdmzMBWKjx/Zk0n/+4eCIrg9/bZuXFM7TUXz6ROdn7WUbSkyn3Y//jY6JKcUkN/aZchUAhDUiB3NCJjIF//tUxHwAD6D3Ps3gy8HBHyjplpsIY0QzOMFYbMVAUzER2eNNTncpyKWXxifeBtFsixwIwF4NwAsQqIWgI0g7YEEeCIslp0r052vs2WIgoBhhc6GK7msxqpQ2qkZ6chu1//7WzEK3cdIQ+RDBDMgRvaZPuXg8oSwEZEy1UFUjZAeFZw9qp8ntpyCRdY8ShsSNh5Oa/lwY3gyHKwcRABgCkZ/AAJcRAFQFaSfF6Lv3GIhadGENqzcuGz9ShNszSlgC//tUxFqD0Tj3Oi3hK8IQn2fBvCV6m7BUYUcByWJK4FhrlQUzUVZerG0OIvK2stl+OOtcnlbjK//6yeasdWjpohOFxAnIhLEyHyPTcTiCkRCTEjj9vbQiIyjJCOEiYDxghs1GoHzKw6bklbP3vEQCAADhpQDOPBL8gYiDhY3EegxwZAY7LRH6Z2/EfdCluOgpQm/AQVaVJl3Qo8mAlOIBlUb1MQaGmezqC2HrfkkOK4XbL30fbLu93LvEc+f38s+v//tUxCkDDmTxQE1gy9n/HqfJvCVwJSDlxk3Obj9mU56XMxR5wSQcnSOTfuLl4dSXd5+lxCj4gYBAESjCTc0sFBACZwCmeAhzxSYQDJCsRWYl27NWAmiyplzlwWW4HAEgAopnTog2JqAWSM5VhozMNGflYWNyB+VQvrLp6LHkM0DbHbUnOoy/9wz3BNLG7Trc91aBhsoNlirC6W2SohwVqTJEDSqIlFRk0giiQtXV5O+uxpo1+lMAuQCXWk4CqRTC//tUxAUACqD5VUwwZ9FanqhNhI4YNsspUQFrO4BAMhkXKjAcKHHL7naGy+qVnZeasppPZWqsDN7JSIQ5mEmcK3efRRsSGWWfmW3XPJ3ZACIXnoiIWVc/iLQ4tKHMEH/rAVQBAMeAo4YkrsBWNPA68w7ksf2AX5iNFqahamLMmHAGRIy4ZBEVI/JqVUkhZQoUJKhipjwq5KHJ7J/nIzQiyK5nkskk/jg1GL2ZVIszFBuQiW5M4USSB6VAlUgIAR3n//tUxASACczvO0ykaYkvC+Y1lI0xYer1USwkPuxAcYcURHUIhDLgWWQH424VPoaFKBFLJNImqvW2IrQHalBTVRiL9ftL/Y/vGVV+6qyqpMzfs0O//w6pGBFCoBRegAQcZRAMTtTsICeNgaIyljYG2quFJGcC6gLjYwPLWwvUmmdZM+F/Z9KlAMWAnsikZWkyHLw7l58fmvLwbYpWC2xAvKg1rCn/+NUAGABgMAPKWwQFdkSDGcQixWRuUrAzoVWz//tUxAyAyZhdIQ08xwkfjuPVthiZYr4YcSOfCgJOLoSYAgqqbbXvs5aTH2iFAo+SkihqJ7dJr9L3N4hAWucGArDfGX8tV1gYWEwIiE4MQj7HXJQzDgtLLp1DtiyDGAgoKIjPi6WtIlUWtmZmkDgmuHrIzav7iy4nmbQ8Y5Sg6e4ehRxMeECsG5X8VUgqUgV1QjTNj6pwgO6TzpGvfdTmSk7EyVwJiz1UJG9WAWqoVstgdcsgTNCcHEofbr6znl/7//tUxBeCSOzlHA0kZ0knmePatDABsfakNy0Mq9mZbEgfJ4sNCgF1owfVmcxSkAIBPg5JQaBPbCNyaY3TWqlK5EqjEkvA8Wwcxww6sb1HFXBKIIjW6oUiGQlq9BTf3p/l7ykaO0aUORoFHQ9B0VicazYqnEjLNUXqMhcgYAcjhigw+A0BAQAAAfWuW/UODjS5sDysDGCy6j6ZNWCwoMBnEUDEjGGUAP6RAwFiBbsnyfUBwIC4wMBhwniRMytE4CuC//tUxCQAEYUdRfmZgAFPnqj3noABCBNGhYVQZAiIGYQXsFBg2IIsaqcsfkFFxjeHPPi5x3OpZdMf6c3TNxzCCImJkRIoGJz/IgM2T5uadJJKpJIx/9O/9RqoYiQAQCoXQD+QRoHC2m8X8sCHLpVmiwMx2CZH8W0FYLRUwGw/JMrlRg9YvmtpphrmxPbSKubzDa/F7fO01z//KztrK7WNUY0XTOv/fd+vVtYqbjsqwAAJDCKVw9MpBzfJW2G6SluT//tUxAmACcRzQye8wclAjyj09hjhLmpEQBgOMuxPnpPyWRNk80xDSdNCCEk2pByaC8KCEFVB6cqt9vx3AP+cADx8e807AAZWXLc/P/9OfTm3dmwAQDG3gC3i8JFOYIIA3A6i0Ejgy8WwiEPTBKH4jlkRBJKCM2aa7uWdRxKtqksqv9rz/KKMfrpsL/hBXwhv+NigpsuR0IpCQgopCDa1yiolJ0gAABMqAEpLEfKoTA4hXGOETo3mdIOSEkqOsQoL//tUxA+BChBzP6ewbkkymGXZgwpZysLhBSRJxDPGICOWJUFDDqKEkayyo7oOBqqrNwaaLtFmhKGlU2q9zaOVc9XtKoMalpWCAoHLZm7tI4Qiiha/3vKsqRO9alGcBrRZGlyz1tLtLYoBgyQKhDQWGd6Y5IOgQBWbvl3YxqWZq/Zkpuh22VK67uCLCRIJea9n7nnK1RgJIIORl+qMv4mUIgynn3c97CsG6+3/TQXhWUaEQNoqn4hD0UeHYI3fIzN6//tUxBYBScR1Ji0w0kkpDmSZrBh5PvhJrn1IGGu3t9KZqw8lYt1qe4VcNfWmdg//YrCaTrEBKgQEjsmfFjjSbzKCga3WX4OY+0/asDCihSg00/UNurO000FiwFBMFNRmpXTefhVbFWUuJZjnAu1f+XyfRLXCsT/3t4+UJxUtMv/zqhANtpJD4OO0MRQRNeZ1J3XTGnJVQvoptEnbCqMWEZiIpLB48sgFRpdQEjS4EG2DMpE3QahcrbfyyX9c0bqb//tUxB8DSUTDGi0kboEsGaKBp4x5tl9pXgnPm8SpuO2UmgnGFJUjVGUWFKP8thUoSnHa2olIolYnkgn4sljEEgVhbMjJGdBLs/p5k1KCSyWESPUkSTvqm/TSK5jsohrBKugdSCIsGKcFJRrt1QAlIkASA2YDxjNbckcKjD0gpE65AkiGC4jgqdK1nZTEbmqsHVlzQdxQyfBdo4JgdCgqq1S0FSRlZBQq0hQk+lKP/+3Zs09fpAv86gtISlgahdbI//tUxCmCSPhtGu0YZIEUmiLBpIzhQMpEiOzp0kYUUi9IQqGlc8w4cjIR5j1IjVh6ZuGBFrFzMid3rwjfTNjJ6nuvIaHoaOLhDLCHJvnergAgAZqCSgQEHhwZBUnYXVHR9MeWOGYHYGq0QPXAStYMJMn1cJs5I6pl6pFpdZI0UqnyqkB00XBKw5A6UhhNXqG9QzbVpspKHZ3LsRi6I12X7G7EebSxXnspOTlSaiFJnjEqJ1a4DCmKnG61baaEpDiS//tUxDiCyVDvFq0kYYkQlqMVow1hPuxvDJ+1GQ7ZbEVCVKyrjIwT68UU7C9orvG3h07dN4PH5aJLvthITeXWExotadFJW5RQsAFNc6XzXxBacVn2ztSXb6bPLfe0nvs4ia7JvmPh+W0bc3OwxTULsoWlbbaVSq2KFCcx9//9hMowDRQZdsFQiCGn2YpGIjOpKDOCgD2cnMIHEceD0gNMZ0ajIyMJgVQmpIkr9rkaXptTIyOWpXrrneFq5nBjxYGM//tUxEaCyWStFA0ww0kkmKLVsw1xFTZPPuPn71UAKAAWYHHA4YGCyP4JYn0pBwZixwoGVuWjL/5Hx/IzV8efeDQuxBE2gcPQHg0pwqtYUKCgerGktoVcDEFQMJRDYaV/p///+slIkCUxNA7FEJKdOjWLMzIYOqjyRKoFEZro+yvzSqGot9EME4eKBURGyyTbVJA6lIGLNtaQMm8ruF7P/R//6fqVAEAAuLMkDJhTyvfBUCVSKAlOIU7tFFV5hEgY//tUxFGDCOhLGs28wIEADaONkwwwbuTrs/7pmblaxIzpWM8qRFoVNiZGzQmhGup+XUhOTx3UHWBnVOht5clvmS7t/whhmaDnNIJiNiChIXZPH4RbxUZVRubVbl8SaTyxAGpAfSOgoyOJggxbFPDKJYQymaH7VTWLlyDodZDLWEE5wo/YbD6WMoDt0O/aAAAlopECU3Chtp+LR4onebkNJbZV7hLbKZTjOOIQMiwmHUbyMkW/J8ZHdCFtDYQBEgAQ//tUxGMCSSjRFq0kZ8klm6KFtIy5w48ZNtJjxS9Qtv83/0U7f9H++gQBJAEgj5GUDJkBo0lKUKpOTKFqOgYw8DQqbnAw82ADYWaXcYFw8G2AyXGsYFQTcWXeh7SRlBFTXij3sVan+lPT//0VN51wGMjQc279LvdyM00llTkLIhwIGOBylnpOxxN4izJJ0XJjRi2QmbxNOmTMjQ8l7HRH3kcHITZm2Zl1nRUls5QUKXWkjDVZXrpF/0AgwgBBAEhs//tUxG8CCMiDH0yYY8EMheOdowwoJpMAGJsuLpEMWIGm0XvMjk/KSKYkkAlPKihoOiVQjMGhM0VKxYJLIlguZAh5IraPTARdzhZ55ySrFBL/1f3//oUIoAAWEYoHdgZd4lohJE22F3kEScqJwo5G+DSnq8CUWQthFFwQXpRcRz7oT+jxA4dIyID4DIafORPrvQyXSjwAij6kIvck2ewGYUpiVViVJHEnZI1Akek6gZI0ipZRqsFO1VBVAShbMDWN//tUxH+ACYzjFA2Ya8kghmPppgwwT12PpKrNQqxoxqpM1Y+qTVW1UsMKn4GmhUpsUK4FX8mqMAAACCoKWAwcPCZ0OksKhKFAq4iSWMCp08ejB/H0FioCVJB0TZ7sOxgF+VFEV9BbOnv/ohVyCKhqg00zKwMEDR0QyNWsBgwVjoZGysoIHDAByUrTVUGLJgYlUGQ1UVVdMMSqlK000XWK01VRFl+VVVW/+V00///TTUxBTUUzLjEwMC4xVVVVVVVV//tUxIqAyNSJHK0kY8kOGKJA8wyxVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//tUxJqBhuQI/OMMYAEGCpFAMIxJVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV"  controls="controls" autobuffer="autobuffer"></audio>
        </div>

    </body>
</html>
