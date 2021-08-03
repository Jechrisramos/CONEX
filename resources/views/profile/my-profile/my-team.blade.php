<div class="custom-card row">
    <h4>Team Roster</h4>

        @forelse($members as $member)
        <div class="team-tab row">
            <img class="team-avatar-thumbnail col-lg-4 flex" src="{{ $member->avatar->avatar }}"> 
            <div class="col-lg-8 team-tab-info flex">
                <span class="team-tab-info-name"><strong>{{ $member->name }}</strong><span>
                <span class="team-tab-info-id">{{ ucwords($member->role->role) }}</span> 
            </div>
        </div><!--endofrow-->

        @empty
        
        <div class="team-tab row">
            <p>You have no Team Member.</p>
        </div><!--endofrow-->
        </tr>
        @endforelse
    </table>
</div><!--endofcard-->